<?php

namespace App\Services\Stats;

class TopTeamsStats
{
    public function __construct(
        public TopTeamsStatCollection $topPossession,
        public TopTeamsStatCollection $topShoots,
        public TopTeamsStatCollection $topEffectivity,
        public TopTeamsStatCollection $topPasses,
        public TopTeamsStatCollection $topSteals,
        public TopTeamsStatCollection $topFouls,
        public TopTeamsStatCollection $topCorners,
        public TopTeamsStatCollection $topYellowCards,
        public TopTeamsStatCollection $topRedCards,
        public TopTeamsStatCollection $topPenalties,
        public TopTeamsStatCollection $topGoals,
    ) {
    }

    public function toArray(): array
    {
        return [
            'possession'  => array_values($this->topPossession->toArray()),
            'shoots'      => array_values($this->topShoots->toArray()),
            'effectivity' => array_values($this->topEffectivity->toArray()),
            'passes'      => array_values($this->topPasses->toArray()),
            'steals'      => array_values($this->topSteals->toArray()),
            'fouls'       => array_values($this->topFouls->toArray()),
            'corners'     => array_values($this->topCorners->toArray()),
            'yellowCards' => array_values($this->topYellowCards->toArray()),
            'redCards'    => array_values($this->topRedCards->toArray()),
            'penalties'   => array_values($this->topPenalties->toArray()),
            'goals'       => array_values($this->topGoals->toArray()),
        ];
    }
}
