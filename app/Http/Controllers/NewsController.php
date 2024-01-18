<?php

namespace App\Http\Controllers;

use App\Models\News;
use Inertia\Inertia;
use Inertia\Response;

class NewsController extends Controller
{
    public function post(News $news): Response
    {
        return Inertia::render('News/Post', [
            'news' => $news,
        ]);
    }

}
