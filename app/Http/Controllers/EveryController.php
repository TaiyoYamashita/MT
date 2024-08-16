<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Favorite;
use App\Models\History;
use App\Models\Tag;

class EveryController extends Controller
{
    public function show(Post $post)
    {
        $tags = new Tag();
        $tags = $tags->getTags($post->id);
        $bool = $post->findFavorite();
        return view('everybody.show')->with(['post' => $post, 'tags' => $tags, 'references' => $post->references(), 'bool' => $bool]);
    }
    
    public function create(Post $post)
    {
        $tags = new Tag();
        return view('everybody.create')->with(['post' => $post, 'tags' => $tags]);
    }
    
    // 「みんなの投稿」の文章を基に新規文章を作成した際の保存処理
    public function store(Request $request, Post $post, History $history)
    {
        // 履歴登録
        $input = ['user_id' => $request->user()->id, 'post_id' => $post->id];
        $findHistory = $history->findHistory($input);
        if ($findHistory)
        {
            $findHistory->fill(['used_at' => now()])->save();
        }
        else
        {
            $history->fill($input)->save();
        }
        
        // 新規文章の保存 
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $input += ['reference' => $post->id];
        $newPost = new Post();
        $newPost->fill($input)->save();
        
        // posts_tagsテーブルに文章とタグのリレーションを保存
        $tags = new Tag();
        if ($request['checkbox'] !== null)
        {
            foreach ($request['checkbox'] as $id => $tag)
            {
                $tags->insertIntoPostsTags($post, $id);
            }
        }
        return redirect('/saved/' . $newPost->id);
    }
    
    public function favorite(Request $request, Post $post, Favorite $favorite)
    {
        $input = ['user_id' => $request->user()->id];
        $input += ['post_id' => $post->id];
        //$input += ['saved_at' => now()];
        $favorite->fill($input)->save();
        return redirect('/every/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $favorite = Favorite::where('user_id', Auth::id())->where('post_id', $post->id);
        $favorite->delete();
        return redirect('/every/' . $post->id);
    }
}
