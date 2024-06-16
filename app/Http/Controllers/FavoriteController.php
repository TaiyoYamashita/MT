<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function register(Request $request, Post $post, Favorite $favorite)
    {
        $input = ['user_id' => $request->user()->id];
        $input += ['post_id' => $post->id]; // このままだと投稿IDを入手できない
        $favorite->fill($input)->save();
        return redirect('/every/' . $post->id . '/show');
    }
}
