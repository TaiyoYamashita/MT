<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MTController extends Controller
{
    public function top(){
        return view('WELCOME');
    }
    
    public function everybody(){
        return view('everybody');
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
