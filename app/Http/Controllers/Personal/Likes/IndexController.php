<?php

namespace App\Http\Controllers\Personal\Likes;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function __invoke()
    {
        $articles = auth()->user()->likedArticles;
        return view('personal.likes.index', compact('articles'));
    }
}
