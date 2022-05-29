<?php

namespace App\Http\Controllers\Personal\Articles;

use App\Http\Controllers\Controller;
use App\Models\Articles;

class DeleteController extends Controller
{

    public function __invoke(Articles $article)
    {
        $article->delete();
        return redirect()->route('personal.articles.index');
    }
}
