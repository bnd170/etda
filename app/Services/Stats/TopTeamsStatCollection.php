<?php

namespace App\Services\Stats;

use function Lambdish\Phunctional\map;

class TopTeamsStatCollection
{
    /**
     * @var TopTeamStat[] $topTeamsStat
     */
    public function __construct(public readonly array $topTeamsStat)
    {
    }

    public function toArray(): array
    {
        return map(fn(TopTeamStat $topTeamStat) => $topTeamStat->toArray(), $this->topTeamsStat);
    }
}
