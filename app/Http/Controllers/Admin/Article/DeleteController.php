<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\Articles;


class DeleteController extends BaseController
{

    public function __invoke(Articles $article)
    {
         $article->delete();
         return redirect()->route('admin.article.index');
    }
}
