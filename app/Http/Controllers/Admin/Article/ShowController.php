<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Articles;

class ShowController extends Controller
{

    public function __invoke(Articles $article)
    {
        return view ('admin.articles.show', compact('article'));
    }
}
