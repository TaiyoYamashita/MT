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

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results = new Tag();
        $results = $results->search($request['checkbox'], $request['keyword']);
        return view('search.searched')->with(['results' => $results, 'keytags' => $request['checkbox'], 'keyword' => $request['keyword']]);
    }
    
    public function search2(Request $request)
    {
        $keytags = json_decode($request->input('tags'), true);
        $keyword = $request->query('keyword');
        $results = new Tag();
        $results = $results->search($keytags, $keyword);
        return view('search.searched')->with(['results' => $results, 'keytags' => $keytags, 'keyword' => $keyword]);
    }
    
    public function show(Request $request, Post $post)
    {
        $keytags = json_decode($request->input('tags'), true);
        $keyword = $request->query('keyword');
        $bool = $post->findFavorite();
        return view('search.show')->with(['post' => $post, 'references' => $post->references(), 'bool' => $bool, 'keytags' => $keytags, 'keyword' => $keyword]);
    }
    
    public function create(Request $request, Post $post)
    {
        $keytags = json_decode($request->input('tags'), true);
        $keyword = $request->query('keyword');
        return view('search.create')->with(['post' => $post, 'tags' => Tag::all(), 'keytags' => $keytags, 'keyword' => $keyword]);
    }
    
    public function favorite(Request $request, Post $post, Favorite $favorite)
    {
        $input = ['user_id' => $request->user()->id];
        $input += ['post_id' => $post->id];
        //$input += ['saved_at' => now()];
        $favorite->fill($input)->save();
        return redirect('/search/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $favorite = Favorite::where('user_id', Auth::id())->where('post_id', $post->id);
        $favorite->delete();
        return redirect('/search/' . $post->id);
    }
}