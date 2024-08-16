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
        return view('favorite.create')->with(['post' => $post, 'favorite' => $favorite]);
    }
    
    // request編集必要　お気に入り登録した文章を基に新規文章を作成した際の保存処理
    public function store(Request $request, Post $post)
    {
        // 履歴登録
        $input = ['user_id' => $request->user()->id, 'post_id' => $post->id];
        $history = new History();
        $findHistory = $history->findHistory($input);
        if ($findHistory)
        {
            $findHistory->fill(['used_at' => now()])->save();
        }
        else
        {
            $history->fill($input)->save();
        }
        
        // 作成した文章の保存
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $input += ['reference' => $post->id];
        $post = new Post();
        $post->fill($input)->save();
        
        return redirect('/saved/' . $post->id);
    }
}
