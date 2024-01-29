<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\News;
use App\Models\Ranking;
use App\Models\Season;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $season = Season::where('in_progress', true)->first();
        $nextGames  = Game::pending()->where('season_id', $season->id)->orderBy('date', 'asc')->limit(4)->get();
        $playedGames  = Game::notPending()->where('season_id', $season->id)->orderBy('date', 'desc')->limit(4)->get();
        $season  = Season::where('in_progress', true)->first();
        $ranking = Ranking::where('season_id', $season->id)->orderBy('points', 'desc')->orderBy('goal_differential', 'desc')->with(
            'team'
        )->get();
        $news = News::orderBy('created_at', 'desc')->limit(3)->get();

        return Inertia::render('Home/Index', [
            'season' => $season,
            'nextGames'  => $nextGames,
            'playedGames'  => $playedGames,
            'ranking' => $ranking,
            'news' => $news,
        ]);
    }
}
