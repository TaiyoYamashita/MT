<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\History;
use App\Models\Tag;

class HistoryController extends Controller
{
    public function show(History $history)
    {
        $tags = new Tag();
        $post = DB::table('posts')->where('id', $history->post_id)->first();
        $tags = $tags->getTags($post->id);
        return view('history.show')->with(['history' => $history, 'tags' => $tags]);
    }
    
    public function store(Request $request, History $history)
    {
        // 使用に知事の更新
        $input = ['used_at' => now()];
        $history->fill($input)->save();
        
        // 新規文章の保存
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $input += ['reference' => $history->post_id];
        $newPost = new Post();
        $newPost->fill($input)->save();
        
        // posts_tagsテーブルに文章とタグのリレーションを保存
        $tags = new Tag();
        if ($request['checkbox'] !== null)
        {
            foreach ($request['checkbox'] as $id => $tag)
            {
                $tags->insertIntoPostsTags($newPost, $id);
            }
        }
        return redirect('/saved/' . $newPost->id);
    }
    
    public function create(History $history)
    {
        $post = $history->post;
        return view('history.create')->with(['post' => $post, 'history' => $history, 'tags'=> Tag::all()]);
    }
    
    public function delete(History $history)
    {
        $history->delete();
        return redirect('/history');
    }
}
