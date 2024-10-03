<?php

namespace App\Services\Predictor;

use App\Models\Prediction\Game;
use App\Repositories\PredictionRepositoryInterface;

class PointsDistributor
{
    public function __construct(
        private PredictionRepositoryInterface $predictionRepository
    ) {
    }

    public function distributeFor(Game $game): void
    {
        $predictions = $this->predictionRepository->findByGameId($game->id);

        foreach ($predictions as $prediction) {
            $prediction->points = 3;
        }
    }
}
