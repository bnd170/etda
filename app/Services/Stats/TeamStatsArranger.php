<?php

namespace App\Services\Stats;

use App\Models\Game;
use App\Models\Season;
use Illuminate\Database\Eloquent\Collection;

class TeamStatsArranger
{
    public function __invoke(): TeamStatsResponse
    {
        $games = $this->getSeasonGames();
        dd($games->map(function (Game $game) {
            return [
                'home_team' => array_merge($game->homeTeam->jsonSerialize(), ['stats' => $game->stats->home]),
                'away_team' => array_merge($game->awayTeam->jsonSerialize(), ['stats' => $game->stats->away]),
                ];
        }));
    }

    private function getSeasonGames(): Collection
    {
        $season = Season::where('in_progress', true)->with('games')->first();

        return $season->games()->where('status', 'finished')->get();
    }
}
