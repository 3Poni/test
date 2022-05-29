<?php

namespace App\Http\Controllers\Personal\Articles;

use App\Http\Controllers\Controller;
use App\Service\ArticleService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }


}
