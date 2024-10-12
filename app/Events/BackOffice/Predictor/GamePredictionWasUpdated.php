<?php

namespace App\Events\BackOffice\Predictor;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GamePredictionWasUpdated
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public int $predictionId,
        public int $pointsAchieved
    ) {
    }
}
