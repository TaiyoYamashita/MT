<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post; //モデルも使用宣言をする

class MTController extends Controller
{
    public function tmp(){
        return view('template');
    }
    
    public function top(){
        return view('WELCOME');
    }
    
    public function everybody(User $user, Post $posts){
        return view('everybody')->with(['posts' => $posts->get()]);
    }
    
    public function genre(){
        return view('genre');
    }
    
    public function history(){
        return view('history');
    }
    
    public function favorite(){
        return view('favorite');
    }
    
    public function posted(){
        return view('posted');
    }
}
