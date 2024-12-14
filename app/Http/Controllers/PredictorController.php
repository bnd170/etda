<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePredictionRequest;
use App\Models\Predictor\Prediction;
use App\Models\Predictor\Tournament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class PredictorController extends Controller
{
    public function tournamentGames(Tournament $tournament): Response
    {
        return Inertia::render('Predictor/Index', [
            'tournament' => $tournament,
            'games'      => $tournament->games()->with(
                [
                    'predictions' => function ($query) {
                        $query->where('user_id', Auth::user()->id);
                    },
                ]
            )->orderBy('date')->get(),
        ]);
    }

    public function tournamentMyPredictions(Tournament $tournament): Response
    {
        return Inertia::render('Predictor/MyPredictions', [
            'tournament' => $tournament,
            'games'      => $tournament->games()->with(
                [
                    'predictions' => function ($query) {
                        $query->where('user_id', Auth::user()->id);
                    },
                ]
            )->orderBy('date')->get(),
        ]);
    }


    public function tournamentRanking(Tournament $tournament): Response
    {
        return Inertia::render('Predictor/Ranking', [
            'tournament' => $tournament,
            'rankings'   => $tournament->rankings()->with(['user' => function ($query) {
                $query->select('id', 'name');
            }])->orderBy('position')->get(),
        ]);
    }

    public function savePrediction(Tournament $tournament, SavePredictionRequest $request): RedirectResponse
    {
        if ($prediction = $request->user()->predictions()->where('predictor_game_id', $request->predictor_game_id)->first()) {
            Gate::authorize('update', [$prediction]);
        } else {
            $game = $tournament->games()->find($request->predictor_game_id);
            Gate::authorize('create', [Prediction::class, $game]);
        }

        $request->user()->predictions()->updateOrCreate(
            ['predictor_game_id' => $request->predictor_game_id, 'user_id' => $request->user()->id],
            $request->validated(),
        );


        return redirect()->route('predictor.index', $tournament);
    }
}
