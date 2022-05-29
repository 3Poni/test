<?php

namespace App\Http\Controllers\Main\Articles;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\ArticlesTags;
use App\Models\Tag;
use Carbon\Carbon;

class ShowController extends Controller
{

    public function __invoke(Articles $article)
    {

        $date = Carbon::parse($article->created_at);
//        $relatedTags = ArticlesTags::where('art_id', $article->id)
//            ->tag();
        $relatedArticles = Articles::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->get()
            ->take(3);
        return view ('main.articles.show', compact('article', 'date', 'relatedArticles'));
    }
}
