<?php

namespace App\Http\Controllers\Personal\Articles;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends BaseController
{

    public function __invoke(Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view ('personal.articles.create', compact('categories', 'tags'));
    }
}
