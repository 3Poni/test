<?php

namespace App\Http\Controllers\Personal\Comments;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class DeleteController extends Controller
{

    public function __invoke(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
