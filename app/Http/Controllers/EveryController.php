<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class EveryController extends Controller
{
    public function show(Post $post)
    {
        return view('everybody.show')->with(['post' => $post]);
    }
    
    public function create($id)
    {
        $post = Post::findOrFail($id);
        return view('everybody.create')->with(['post' => $post]);
    }
}
