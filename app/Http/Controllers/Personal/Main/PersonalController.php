<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{

    public function __invoke(Request $request)
    {
        $id = auth()->user()->id;
        $data ['articlesCount'] = DB::table('articles')->where('user_id', $id)->count();
        $data ['commentsCount'] = DB::table('comments')->where('user_id', $id)->count();;
        $data ['likesCount'] = DB::table('article_user_likes')->where('user_id', $id)->count();;

        return view('personal.main.index', compact ('data'));
    }
}
