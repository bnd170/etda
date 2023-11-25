<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class NewsController extends Controller
{
    public function post(): Response
    {
        return Inertia::render('News/Post');
    }

}
