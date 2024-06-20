<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    
    public function show(Favorite $favorite)
    {
        return view('favorite.show')->with(['post' => $favorite]);
    }
    
    public function delete(Favorite $favorite)
    {
        $favorite->delete();
        return redirect('/favorite');
    }
}
