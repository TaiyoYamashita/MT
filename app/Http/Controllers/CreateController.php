<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function create ($form, Post $post)
    {
        return view('template.create')->with(['form' => $form, 'post' => $post]);
    }
}