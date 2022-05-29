<?php

namespace App\Http\Controllers\Main\Articles\Likes;

use App\Http\Controllers\Controller;
use App\Models\Articles;

class StoreController extends Controller
{

    public function __invoke(Articles $article)
    {
        $articles = auth()->user()->likedArticles()->toggle($article->id);
        return redirect()->back();
    }
}
