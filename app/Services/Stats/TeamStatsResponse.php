<?php

namespace App\Services\Stats;

use App\Models\Game\TeamStats;

readonly class TeamStatsResponse
{
    public function __construct(
        public int $teamId,
        public string $name,
        public string $tag,
        public string $logo,
        public string $sheetName,
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
        public int $goals,
    ) {
    }

    public static function from(
        TeamStats $teamStats,
        int       $teamId,
        string    $name,
        string    $tag,
        string    $logo,
        string    $sheetName
    ): self {
        return new self(
            $teamId,
            $name,
            $tag,
            $logo,
            $sheetName,
            $teamStats->possession,
            $teamStats->shoots,
            $teamStats->effectivity,
            $teamStats->passes,
            $teamStats->steals,
            $teamStats->fouls,
            $teamStats->corners,
            $teamStats->yellowCards,
            $teamStats->redCards,
            $teamStats->penalties,
            0
        );
    }
}
