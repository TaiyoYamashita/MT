<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post; //モデルも使用宣言をする

class TemplateController extends Controller
{
    public function template(){
        $path=public_path('template.css');
        $content=File::get($path);
        $type=File::mineType($path);
        return response($content,200)->header('Content-Type',$type);
    }
    
    public function top(){
        return view('WELCOME');
    }
    
    public function everybody(Post $post){
        return view('everybody.everyone')->with(['all_posts' => $post->getPublicPaginateByLimit()]);
    }
    
    public function genre(){
        return view('genre.genres');
    }
    
    public function history(){
        return view('history.histories');
    }
    
    public function saved(User $user){
        return view('saved.saves')->with(['own_posts' => $user->getSavedPaginateByLimit()]);
    }
    
    public function favorite(){
        return view('favorite.favorites');
    }
    
    public function posted(User $user){
        return view('posted.posts')->with(['own_posts' => $user->getPostedPaginateByLimit()]);
    }
}
