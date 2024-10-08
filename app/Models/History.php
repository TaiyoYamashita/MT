<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class History extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'post_id',
        'used_at'
    ];
    
    public $timestamps = false;
    
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    
    public function findHistory ($input)
    {
        return $this::where('user_id', $input['user_id'])->where('post_id', $input['post_id'])->first();
    }
    
    public function post ()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function findHistory($input)
    {
        return $this::where('user_id', $input['user_id'])->where('post_id', $input['post_id']);
    }
    
    public function getHistoryPaginateByLimit(int $limit = 20)
    {
        return $this::with(['user','post'])->where('user_id', Auth::id())->orderBy('used_at', 'DESC')->paginate($limit);
    }
}
