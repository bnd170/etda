<?php

namespace App\Http\Controllers;

use App\Http\Requests\NationalLeagueStatsRequest;
use App\Models\Game;
use App\Models\News;
use App\Models\Ranking;
use App\Models\Season;
use App\Models\Team;
use App\Services\Stats\TeamStatsArranger;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class NationalLeagueController extends Controller
{

    public function classification(): Response
    {
        $season  = Season::where('in_progress', true)->first();
        $ranking = Ranking::where('season_id', $season->id)->orderBy('points', 'desc')->orderBy(
            'goal_differential',
            'desc'
        )->with(
            'team'
        )->get();


        return Inertia::render('League/Classification', [
            'season'  => $season,
            'ranking' => $ranking,
        ]);
    }
    public function calendar(): Response
    {
        $season  = Season::where('in_progress', true)->first();
        $games  = Game::where('season_id', $season->id)->orderBy('date', 'asc')->get();
        $gamesByDate = $games->groupBy(fn($game) => $game->date->format('Y-m-d'));

        return Inertia::render('League/Calendar', [
            'games'  => $gamesByDate,
        ]);
    }

    public function news(): Response
    {
        $news = News::orderBy('created_at', 'desc')->limit(12)->get();

        return Inertia::render('League/News', [
            'news' => $news,
        ]);
    }

    public function stats(NationalLeagueStatsRequest $request, TeamStatsArranger $teamStatsArranger): Response
    {
        $stats = $teamStatsArranger(day: $request->day);
        $days = Game::getDaysWithStatus();

        return Inertia::render('League/Stats', [
            'stats'     => $stats->stats(),
            'top_stats' => $stats->generateGlobalStats()->toArray(),
            'day'       => $request->day ?? 'all',
            'days'      => $days,
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


