<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\History;
use App\Models\Favorite;
use App\Models\Tag;

class FavoriteController extends Controller
{
    
    public function show(Favorite $favorite)
    {
        $tags = new Tag();
        $post = DB::table('posts')->where('id', $favorite->post_id)->first();
        $tags = $tags->getTags($post->id);
        return view('favorite.show')->with(['post' => $favorite, 'tags' => $tags]);
    }
    
    public function delete(Favorite $favorite)
    {
        $favorite->delete();
        return redirect('/favorite');
    }
    
    public function create(Favorite $favorite)
    {
        $post = $favorite->post;
        return view('template.create')->with(['post' => $post, 'favorite' => $favorite, 'tags' => Tag::all()]);
    }
}
