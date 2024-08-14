<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    
    public function histories()
    {
        return $this->hasMany(History::class);
    }
    
    public function getPublicPaginateByLimit(int $limit=1)
    {
        return $this::with('user')->where('private_or_public', 2)->orderBy('updated_at', 'DESC')->paginate($limit);
    }
    
    public function references()
    {
        return $this->belongsTo(Post::class, 'reference');
    }
    
    public function search($tags, $keyword, int $limit = 1)
    {
        $result = [];
        foreach($tags as $tag){
            $result += $this::with('posts_tags')->where('private_or_public', 2)->where('tags', $tag);
        }
        if ($keyword !== null)
        {
            
        }
        return $result->groupBy('posts.id')->orderBy('posted_at', 'DESC')->paginate($limit);
    }
    
    public function findFavorite()
    {
        return Favorite::where('user_id', Auth::id())->where('post_id', $this->id)->exists();
    }
    
    public function getSavedPaginateByLimit(int $limit = 1)
    {
        return $this::with('user')->where('user_id', Auth::id())->where('private_or_public', 1)->orderBy('updated_at', 'DESC')->paginate($limit);
    }
    
    public function getPostedPaginateByLimit(int $limit = 1)
    {
        return $this::with('user')->where('user_id', Auth::id())->whereIn('private_or_public', [2,3])->orderBy('posted_at', 'DESC')->paginate($limit);

    }
}