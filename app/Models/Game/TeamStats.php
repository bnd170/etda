<?php

namespace App\Models\Game;

use App\Services\Stats\TeamStatsGoalsTranslator;

class TeamStats
{
    public function __construct(
        public int $possession,
        public int $shoots,
        public int $effectivity,
        public int $passes,
        public int $steals,
        public int $fouls,
        public int $corners,
        public int $yellowCards,
        public int $redCards,
        public int $penalties,
        public array $goals = [],
    ) {
    }

    public static function fromArray(?array $data): self
    {
        if ($data === null) {
            return self::empty();
        }

        return new self(
            possession: $data['possession'],
            shoots: $data['shoots'],
            effectivity: $data['effectivity'],
            passes: $data['passes'],
            steals: $data['steals'],
            fouls: $data['fouls'],
            corners: $data['corners'],
            yellowCards: $data['yellowCards'],
            redCards: $data['redCards'],
            penalties: $data['penalties'],
            goals: $data['goals'],
        );
    }

    public static function empty(): self
    {
        return new self(
            possession: 0,
            shoots: 0,
            effectivity: 0,
            passes: 0,
            steals: 0,
            fouls: 0,
            corners: 0,
            yellowCards: 0,
            redCards: 0,
            penalties: 0,
        );
    }

    public function toArray(): array
    {
        return [
            'possession' => $this->possession,
            'shoots' => $this->shoots,
            'effectivity' => $this->effectivity,
            'passes' => $this->passes,
            'steals' => $this->steals,
            'fouls' => $this->fouls,
            'corners' => $this->corners,
            'yellowCards' => $this->yellowCards,
            'redCards' => $this->redCards,
            'penalties' => $this->penalties,
            'goals' => $this->goals,
        ];
    }

    public function sum(TeamStats $teamStats): self
    {
        return new self(
            possession: $this->possession + $teamStats->possession,
            shoots: $this->shoots + $teamStats->shoots,
            effectivity: $this->effectivity + $teamStats->effectivity,
            passes: $this->passes + $teamStats->passes,
            steals: $this->steals + $teamStats->steals,
            fouls: $this->fouls + $teamStats->fouls,
            corners: $this->corners + $teamStats->corners,
            yellowCards: $this->yellowCards + $teamStats->yellowCards,
            redCards: $this->redCards + $teamStats->redCards,
            penalties: $this->penalties + $teamStats->penalties,
            goals: $this->goals + $teamStats->goals,
        );
    }

    public function totalGoals(): int
    {
        return TeamStatsGoalsTranslator::make($this->goals);
    }
}
