<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Ranking;
use App\Models\Season;
use App\Models\Team;
use App\Services\Stats\TeamStatsArranger;
use Inertia\Inertia;
use Inertia\Response;

class NationalLeagueController extends Controller
{

    public function index(TeamStatsArranger $teamStatsArranger): Response
    {
        $season  = Season::where('in_progress', true)->first();
        $ranking = Ranking::where('season_id', $season->id)->orderBy('points', 'desc')->orderBy('losses', 'asc')->with(
            'team'
        )->get();
        $stats = $teamStatsArranger();

        return Inertia::render('Ranking/Index', [
            'season'  => $season,
            'ranking' => $ranking,
        ]);
    }

    public function game(Game $game): Response
    {
        return Inertia::render('Games/Game', [
            'game' => $game,
        ]);
    }

    public function teams(): Response
    {
        return Inertia::render('Teams/Index');
    }

    public function club(Team $team): Response
    {
        return Inertia::render('Teams/Club', [
            'team' => $team,
        ]);
    }
}
