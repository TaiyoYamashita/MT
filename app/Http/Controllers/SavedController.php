<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SavedController extends Controller
{
    public function create()
    {
        return view('saved.create');
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/saved');
    }
    
}
