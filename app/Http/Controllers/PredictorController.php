<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePredictionRequest;
use App\Models\Predictor\Tournament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class PredictorController extends Controller
{
    public function tournamentGames(Tournament $tournament): Response
    {
        return Inertia::render('Predictor/Index', [
            'tournament' => $tournament,
            'games'      => $tournament->games()->with([
                                                           'predictions' => function ($query) {
                                                               $query->where('user_id', Auth::user()->id);
                                                           },
                                                       ])->orderBy('date')->get(),
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
