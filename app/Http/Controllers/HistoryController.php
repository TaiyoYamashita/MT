<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\History;

class HistoryController extends Controller
{
    public function show(History $history)
    {
        return view('history.show')->with(['history' => $history]);
    }
    
    public function store(Request $request, History $history)
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $input += ['reference' => $history->post_id];
        $post = new Post();
        $post->fill($input)->save();
        $input = ['used_at' => now()];
        $history->fill($input)->save();
        return redirect('/saved/' . $post->id);
    }
    
    public function create(History $history)
    {
        $post = $history->post;
        return view('history.create')->with(['post' => $post, 'history' => $history]);
    }
    
    public function delete(History $history)
    {
        $history->delete();
        return redirect('/history');
    }
}
