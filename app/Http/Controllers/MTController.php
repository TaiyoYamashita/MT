<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MTController extends Controller
{
    public function top(){
        return view('WELCOME');
    }
}
