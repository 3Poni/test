<?php

namespace App\Http\Controllers\Personal\Articles;

use App\Http\Requests\Personal\Article\StoreRequest;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        $articles = auth()->user()->postedArticles;
        return redirect()->route('personal.articles.index', compact('articles'));
    }
}
