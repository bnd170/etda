<?php

namespace App\Models\Game;

class GameStats
{
    public function __construct(
        public TeamStats $home,
        public TeamStats $away,
    ) {
    }

    public static function fromArray(?array $data): self
    {
        if ($data === null) {
            return self::empty();
        }

        return new self(
            home: TeamStats::fromArray($data['home']),
            away: TeamStats::fromArray($data['away']),
        );
    }

    public function toArray(): array
    {
        return [
            'home' => $this->home->toArray(),
            'away' => $this->away->toArray(),
        ];
    }

    private static function empty(): self
    {
        return new self(
            home: TeamStats::empty(),
            away: TeamStats::empty(),
        );
    }
}
