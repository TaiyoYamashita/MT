<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostedController extends Controller
{
    public function show(Post $post)
    {
        return view('posted.show')->with(['post' => $post]);
    }
    
    public function save(Post $post)
    {
        $input = ['private_or_public' => 1];
        $post->fill($input)->save();
        return redirect('/saved/' . $post->id);
    }
}
