<?php

namespace App\Http\Controllers\Personal\Articles;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function __invoke()
    {
        $articles = auth()->user()->postedArticles;
        return view('personal.articles.index', compact('articles'));
    }
}
