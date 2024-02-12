<?php

namespace App\Services\Stats;

use function Lambdish\Phunctional\flatten;

class TeamStatsGoalsTranslator
{
    public static function make(array $goals): int
    {
        return count(flatten($goals));
    }
}
