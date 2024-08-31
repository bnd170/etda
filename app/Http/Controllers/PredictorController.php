<?php

namespace App\Http\Controllers;

use App\Models\Prediction\Tournament;
use Inertia\Inertia;
use Inertia\Response;

class PredictorController extends Controller
{
    public function tournamentGames(Tournament $tournament): Response
    {
        return Inertia::render('Predictor/Index', [
            'tournament' => $tournament,
            'games' => $tournament->games()->orderBy('date', 'asc')->get(),
        ]);
    }
}
