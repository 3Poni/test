<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $s = $request->s;
        $data = Articles::where('content', 'LIKE', "%{$s}%")->orWhere('title', 'LIKE', "%{$s}%");
        return view('main.search', ['data' => $data->paginate(9)]);
    }
}
