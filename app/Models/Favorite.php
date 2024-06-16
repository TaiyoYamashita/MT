<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'post_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    //Userモデルで呼び出す？
    public function getFavoritePaginateByLimit(int $limit = 20)
    {
        return $this::with('posts')->find(Auth::id())->post()->orderBy('updated_at', 'DESC')->paginate($limit);
    }
}
