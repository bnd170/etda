<?php

namespace App\Services\Predictor;

use App\Models\Prediction\Game;
use App\Models\Prediction\Prediction;
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
            $this->updatePredictionPoints($prediction, $game);
        }
    }

    private function updatePredictionPoints(Prediction $prediction, Game $game): void
    {
        if ($prediction->isPredictionAccurate($game->getSelectionWinner())) {
            $prediction->addPoints(3);
        } else {
            $prediction->subtractPoints(1);
        }

        if ($prediction->isScoreAccurate($game->home_score, $game->away_score)) {
            $prediction->addPoints(5);
        }
    }
}
