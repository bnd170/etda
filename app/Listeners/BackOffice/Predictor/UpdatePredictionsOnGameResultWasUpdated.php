<?php

namespace App\Listeners\BackOffice\Predictor;


use App\Events\BackOffice\Predictor\GameResultWasUpdated;
use App\Models\Predictor\Game;
use App\Services\Predictor\PointsDistributor;

class UpdatePredictionsOnGameResultWasUpdated
{
    /**
     * Create the event listener.
     */
    public function __construct(
        private readonly PointsDistributor $pointsDistributor
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(GameResultWasUpdated $event): void
    {
        $game = Game::findOrFail($event->gameId);

        $this->pointsDistributor->distributeFor($game);
    }
}
