<?php

namespace App\Services\Stats;

use function Lambdish\Phunctional\map;

class TeamStatsResponseCollection
{
    /**
     * @var TeamStatsResponse[] $stats
     */
    public function __construct(private array $stats)
    {
    }

    public static function init(): self
    {
        return new self([]);
    }

    public function add(TeamStatsResponse $teamStatsResponse): self
    {
        $this->stats[] = $teamStatsResponse;

        return $this;
    }

    public function stats(): array
    {
        return $this->stats;
    }

    public function generateGlobalStats(): TopTeamsStats
    {
        return new TopTeamsStats(
            topPossession: $this->getTop('possession'),
            topShoots: $this->getTop('shoots'),
            topEffectivity: $this->getTop('effectivity'),
            topProratedEffectivity: $this->getTop('proratedEffectivity'),
            topPasses: $this->getTop('passes'),
            topSteals: $this->getTop('steals'),
            topFouls: $this->getTop('fouls'),
            topCorners: $this->getTop('corners'),
            topYellowCards: $this->getTop('yellowCards'),
            topRedCards: $this->getTop('redCards'),
            topPenalties: $this->getTop('penalties'),
            topGoals: $this->getTop('goals'),
        );
    }

    private function getTop(string $string): TopTeamsStatCollection
    {
        $topTeams = collect($this->stats)->sortByDesc($string)->take(4);

        return new TopTeamsStatCollection(map(fn(TeamStatsResponse $teamStatsResponse) => new TopTeamStat(
            name: $teamStatsResponse->name,
            tag: $teamStatsResponse->tag,
            logo: $teamStatsResponse->logo,
            sheetName: $teamStatsResponse->sheetName,
            stat: $teamStatsResponse->$string,
        ), $topTeams));
    }
}
