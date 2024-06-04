<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'title',
        'sentences',
        'memorandum',
        'private_or_public',
        'posted_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    function getPublicPaginateByLimit(int $limit=20)
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit);
    }
}
