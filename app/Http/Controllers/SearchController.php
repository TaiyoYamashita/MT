<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results = new Post();
        $results = $results->search($request['checkbox'], $request['keyword']);
        return view('search.searched')->with(['results' => $results]);
    }
}