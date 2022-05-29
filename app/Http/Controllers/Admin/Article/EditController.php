<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Tag;

class EditController extends Controller
{

    public function __invoke(Articles $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
         return view ('admin.articles.edit', compact('article', 'categories', 'tags'));
    }
}
