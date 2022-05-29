<?php

namespace App\Http\Controllers\Personal\Articles;

use App\Http\Requests\Personal\Article\UpdateRequest;
use App\Models\Articles;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Articles $article)
    {
        $data = $request->validated();
        $article = $this->service->update($data, $article);

        return redirect()->route('personal.articles.index', compact('article'));
    }
}
