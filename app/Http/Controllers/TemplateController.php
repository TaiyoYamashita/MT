<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;
use App\Models\History;
use App\Models\Tag;

class TemplateController extends Controller
{
    public function top(){
        return view('auth.login');
    }
    
    public function register(){
        return view('auth.register');
    }
    
    public function everybody(Post $post){
        return view('everybody.everyone')->with(['all_posts' => $post->getPublicPaginateByLimit()]);
    }
    
    public function search(Tag $tags){
        return view('search.tags')->with(['tags' => $tags->display()]);
    }
    
    public function history(History $history){
        return view('history.histories')->with(['histories' => $history->getHistoryPaginateByLimit()]);
    }
    
    public function saved(Post $post){
        return view('saved.saves')->with(['own_posts' => $post->getSavedPaginateByLimit()]);
    }
    
    public function favorite(Favorite $favorite)
    {
        return view('favorite.favorites')->with(['favorites' => $favorite->getFavoritePaginateByLimit()]);
    }
    
    public function posted(Post $post){
        return view('posted.posts')->with(['own_posts' => $post->getPostedPaginateByLimit()]);
    }
    
    public function paper(){
        $path=public_path('paper.css');
        $content=File::get($path);
        $type=File::mineType($path);
        return response($content,200)->header('Content-Type',$type);
    }
}
