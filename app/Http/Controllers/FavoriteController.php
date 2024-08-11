<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    
    public function show(Favorite $favorite)
    {
        return view('favorite.show')->with(['post' => $favorite]);
    }
    
    public function delete(Favorite $favorite)
    {
        $favorite->delete();
        return redirect('/favorite');
    }
    
    public function create(Favorite $favorite)
    {
        $post = $favorite->post;
        return view('favorite.create')->with(['post' => $post, 'favorite' => $favorite]);
    }
        
    public function store(Request $request) // request編集必要
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $input += ['private_or_public' => 0];
        $post = new Post();
        $post->fill($input)->save();
        return redirect('/saved/' . $post->id);
    }
}
