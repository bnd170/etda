<?php

namespace App\Services\Predictor;

use App\Events\BackOffice\Predictor\GamePredictionWasUpdated;
use App\Models\Predictor\Game;
use App\Models\Predictor\Prediction;
use App\Repositories\PredictionRepositoryInterface;

readonly class PointsDistributor
{
    public function __construct(
        private PredictionRepositoryInterface $predictionRepository
    ) {
    }

    public function distributeFor(Game $game): void
    {
        $predictions = $this->predictionRepository->findByGameId($game->id);

        foreach ($predictions as $prediction) {
            $prediction->updatePoints($game);

            $this->predictionRepository->save($prediction);

            event(new GamePredictionWasUpdated($prediction->id, $prediction->points));
        }
    }
}
