<?php

namespace App\Services\Predictor;

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
            $this->updatePredictionPoints($prediction, $game);

            $this->predictionRepository->save($prediction);
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
