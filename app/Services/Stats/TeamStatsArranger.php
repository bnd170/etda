<?php

namespace App\Services\Stats;

use App\Models\Game\TeamStats;
use App\Models\Season;
use App\Models\Team;

class TeamStatsArranger
{
    public function __invoke(?Team $team = null, int $day = null): TeamStatsResponseCollection
    {
        $games     = $this->getSeasonGames($day);
        $teamStats = $this->calculateTeamStats($games);

        if ($team !== null) {
            $teamStats = $this->filterTeamStats($teamStats, $team);
        }

        return $this->createTeamStatsResponseCollection($teamStats);
    }

    private function getSeasonGames(int $day = null)
    {
        $season = Season::where('in_progress', true)->with('games')->first();

        return $season->games()
            ->when($day, function ($query, $day) {
                return $query->where('day', $day);
            })
            ->where('status', 'finished')->get();
    }

    private function calculateTeamStats($games): array
    {
        $teamStats = [];

        foreach ($games as $game) {
            $teamStats = $this->updateTeamStats($teamStats, $game->homeTeam, $game->stats->home);
            $teamStats = $this->updateTeamStats($teamStats, $game->awayTeam, $game->stats->away);
        }

        return $teamStats;
    }


    /**
     * @param TeamStats[] $teamStats
     * @param Team $team
     * @param TeamStats $stats
     * @return array
     */
    private function updateTeamStats(array $teamStats, Team $team, TeamStats $stats): array
    {
        $teamId = $team->id;

        if (!isset($teamStats[$teamId])) {
            $teamStats[$teamId] = [
                'team'  => $team->jsonSerialize(),
                'stats' => $stats,
            ];
        } else {
            $teamStats[$teamId]['stats'] = $teamStats[$teamId]['stats']->sum($stats);
        }

        return $teamStats;
    }

    private function filterTeamStats(array $teamStats, Team $team): array
    {
        return array_filter($teamStats, function ($teamStat) use ($team) {
            return $teamStat['team']['id'] === $team->id;
        });
    }

    private function createTeamStatsResponseCollection(array $teamStats): TeamStatsResponseCollection
    {
        return new TeamStatsResponseCollection(
            array_map(
                fn($teamStat) => TeamStatsResponse::from(
                    $teamStat['stats'],
                    $teamStat['team']['id'],
                    $teamStat['team']['name'],
                    $teamStat['team']['tag'],
                    $teamStat['team']['logo'],
                    $teamStat['team']['sheet_name']
                ),
                $teamStats
            )
        );
    }
}
