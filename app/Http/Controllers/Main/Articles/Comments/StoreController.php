<?php

namespace App\Http\Controllers\Main\Articles\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\Comments\StoreRequest;
use App\Models\Articles;
use App\Models\Comment;

class StoreController extends Controller
{

    public function __invoke(Articles $article, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['article_id'] = $article->id;

        Comment::create($data);

        return redirect()->route('main.articles.show', $article->id);
    }
}
