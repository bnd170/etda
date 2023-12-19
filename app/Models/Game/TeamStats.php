<?php

namespace App\Models\Game;

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
        ];
    }
}
