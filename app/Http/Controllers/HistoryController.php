<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\History;

class HistoryController extends Controller
{
    public function show(History $history)
    {
        return view('history.show')->with(['post' => $history]);
    }
    
    public function store(Request $request, History $history)
    {
        $input = ['user_id' => $request->user()->id];
        $input += ['post_id' => $post->id];
        $history->fill($input)->save();
    }
}
