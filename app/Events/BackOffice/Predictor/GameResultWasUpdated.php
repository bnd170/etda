<?php

namespace App\Events\BackOffice\Predictor;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GameResultWasUpdated
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public int $gameId,
        public int $homeScore,
        public int $awayScore
    ) {

    }
}
