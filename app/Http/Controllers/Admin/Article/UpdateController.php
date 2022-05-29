<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Requests\Admin\Article\UpdateRequest;
use App\Models\Articles;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Articles $article)
    {
            $data = $request->validated();
            $article = $this->service->update($data, $article);

            return view ('admin.articles.show', compact('article'));
    }
}
