<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class StaticContentController extends Controller
{
    public function aboutUs(): Response
    {
        return Inertia::render('Static/AboutUs');
    }
    public function privacy(): Response
    {
        return Inertia::render('Static/Privacy');
    }
}
