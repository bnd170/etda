<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePredictionRequest;
use App\Models\Prediction\Tournament;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PredictorController extends Controller
{
    public function tournamentGames(Tournament $tournament): Response
    {
        return Inertia::render('Predictor/Index', [
            'tournament' => $tournament,
            'games'      => $tournament->games()->orderBy('date')->get(),
        ]);
    }

    public function savePrediction(Tournament $tournament, SavePredictionRequest $request): RedirectResponse
    {
        $request->user()->predictions()->updateOrCreate(
            ['predictor_game_id' => $request->predictor_game_id, 'user_id' => $request->user()->id],
            $request->validated(),

        );

        return redirect()->route('predictions.index', $tournament);
    }
}
