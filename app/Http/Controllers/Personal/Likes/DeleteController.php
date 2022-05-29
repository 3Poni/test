<?php

namespace App\Http\Controllers\Personal\Likes;

use App\Http\Controllers\Controller;
use App\Models\Articles;

class DeleteController extends Controller
{

    public function __invoke(Articles $article)
    {
        auth()->user()->likedArticles()->detach($article->id);

        return redirect()->route('personal.likes.index');
    }
}
