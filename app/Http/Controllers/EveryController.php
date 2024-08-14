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

class EveryController extends Controller
{
    public function show(Post $post)
    {
        $bool = $post->findFavorite();
        return view('everybody.show')->with(['post' => $post, 'references' => $post->references, 'bool' => $bool]);
    }
    
    public function create($id)
    {
        $post = Post::findOrFail($id);
        return view('everybody.create')->with(['post' => $post]);
    }
    
    public function duplicate(Request $request, Post $post, History $history)
    {
        $input = ['user_id' => $request->user()->id];
        $input += ['post_id' => $post->id];
        $history->fill($input)->save();
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $input += ['reference' => $post->id];
        $newPost = new Post();
        $newPost->fill($input)->save();
        return redirect('/saved/' . $newPost->id);
    }
    
    public function register(Request $request, Post $post, Favorite $favorite)
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