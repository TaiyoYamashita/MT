<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'icon',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getName ()
    {
        return User::find(Auth::id())->name;
    }
    
    public function allPosts (int $limit = 4)
    {
        return Post::where('private_or_public', 2)->orderBy('posted_at', 'DESC')->take($limit)->get();
    }
    
    public function homeSaved (int $limit = 4)
    {
        return Post::where('user_id', Auth::id())->where('private_or_public', [2,3])->orderBy('updated_at', 'DESC')->take($limit)->get();
    }
    
    public function homePosted (int $limit = 4)
    {
        return Post::where('user_id', Auth::id())->where('private_or_public', 1)->orderBy('updated_at', 'DESC')->take($limit)->get();
    }
    
    public function homeHistory (int $limit = 1)
    {
        return History::with('post')->where('user_id', Auth::id())->orderBy('used_at','DESC')->take($limit)->get();
    }
    
    public function homeFavorite (int $limit = 4)
    {
        return Favorite::with('post')->where('user_id', Auth::id())->orderBy('saved_at', 'DESC')->take($limit)->get();
    }
    
    public function countSaves ()
    {
        return Post::where('user_id', Auth::id())->where('private_or_public', 1)->count();
    }
    
    public function countPosts ()
    {
        return Post::where('user_id', Auth::id())->whereIn('private_or_public', [2,3])->count();
    }
    
    public function countFavorites ()
    {
        return Favorite::where('user_id', Auth::id())->count();
    }
}
