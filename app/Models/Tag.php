<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    public function posts()
    {
        return $this::belongsToMany(Post::class, 'posts_tags', 'tag_id', 'post_id');
    }
    
    public function display()
    {
        return $this::all();
    }
    
    public function insertIntoPostsTags(Post $post, int $tag)
    {
        DB::table('posts_tags')->insert([
            'post_id' => $post->id,
            'tag_id' => $tag,
        ]);
    }
    
    public function deleteFromPostsTags(Post $post)
    {
        DB::table('posts_tags')->where('post_id', $post->id)->delete();
    }
}
