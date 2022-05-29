<?php

namespace App\Http\Controllers\Main\Articles;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __invoke()
    {
        $articles = Articles::paginate(9);
        return view('main.articles.index', compact('articles'));
    }
}
