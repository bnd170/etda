<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Inertia\Inertia;
use Inertia\Response;

class NationalLeagueController extends Controller
{
    public function index(): Response
    {
        $season = Season::where('in_progress', true)->first();

        return Inertia::render('Ranking/Index', [
            'season' => $season,
        ]);
    }
    public function teams(): Response
    {
        return Inertia::render('Teams/Index');
    }

    public function club(): Response
    {
        return Inertia::render('Teams/Club');
    }
}
