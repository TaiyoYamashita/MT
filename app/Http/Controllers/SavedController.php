<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
//use App\Https\Requests\PostController;

class SavedController extends Controller
{
    public function create()
    {
        $tags = new Tag();
        return view('saved.create')->with(['tags' => $tags->display()]);
    }
    
    public function store(Request $request, Post $post) // request編集必要
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $input += ['reference' => null];
        $post->fill($input)->save();
        $tags = new Tag();
        if ($request['checkbox'] !== null)
        {
            foreach ($request['checkbox'] as $id => $tag)
            {
                $tags->insertIntoPostsTags($post, $id);
            }
        }
        return redirect('/saved/' . $post->id);
    }
    
    public function show(Post $post)
    {
        return view('saved.show')->with(['post' => $post, 'bool' => $post->example()]);
    }
    
    public function save(){
        $path = public_path('save.css');
        $content = File::get($path);
        $type = File::mineType($path);
        return response($content,200)->header('Content-Type',$type);
    }
    
    public function edit(Post $post)
    {
        $tags = new Tag();
        return view('saved.edit')->with(['post' => $post, 'tags' => $tags->display()]);
    }
    
    public function update(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        $tags = new Tag();
        $tags->deleteFromPostsTags($post);
        if ($request['checkbox'] !== null)
        {
            foreach ($request['checkbox'] as $id => $tag)
            {
                $tags->insertIntoPostsTags($post, $id);
            }
        }
        return redirect('/saved/' . $post->id);
    }
    
    public function post(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $post->private_or_public = 2;
        $post->posted_at = now();
        $post->save();
        return redirect('/posted/' . $post->id);
    }
    
    public function example(Post $post)
    {
        $input = ['private_or_public' => 3];
        $post->fill($input)->save();
        return redirect('/posted/' . $post->id);
    }
    
    public function deletion(Post $post)
    {
        $input = ['private_or_public' => 0];
        $post->fill($input)->save();
        return redirect('/saved');
    }
}