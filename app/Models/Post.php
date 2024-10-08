<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'sentences',
        'memorandum',
        'private_or_public',
        'reference',
        'posted_at'
    ];
    
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorites ()
    {
        return $this->hasMany(Favorite::class);
    }
    
    public function histories ()
    {
        return $this->hasMany(History::class);
    }
    
    public function getPublicPaginateByLimit (int $limit = 1)
    {
        return $this::with('user')->where('private_or_public', 2)->orderBy('updated_at', 'DESC')->paginate($limit);
    }
    
    public function references ()
    {
        return $this::with('user')->where('reference', $this->id)->where('private_or_public', 3)->get();
    }
    
    public function example ()
    {
        return $this->reference !== null && Post::find($this->reference)->private_or_public === 2;
    }
    
    public function findFavorite ()
    {
        return Favorite::where('user_id', Auth::id())->where('post_id', $this->id)->exists();
    }
    
    public function getSavedPaginateByLimit (int $limit = 1)
    {
        return $this::with('user')->where('user_id', Auth::id())->where('private_or_public', 1)->orderBy('updated_at', 'DESC')->paginate($limit);
    }
    
    public function getPostedPaginateByLimit (int $limit = 1)
    {
        return $this::with('user')->where('user_id', Auth::id())->whereIn('private_or_public', [2,3])->orderBy('posted_at', 'DESC')->paginate($limit);

    }
}