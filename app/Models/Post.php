<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'sentences',
        'memorandum'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    function getPaginateByLimit(int $limit=20)
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit);
    }
}
