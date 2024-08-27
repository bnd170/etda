<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class PredictorController extends Controller
{
    public function index()
    {
        return Inertia::render('Predictor/Index');
    }
}
