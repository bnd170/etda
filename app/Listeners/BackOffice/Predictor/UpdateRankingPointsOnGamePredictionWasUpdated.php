<?php

namespace App\Listeners\BackOffice\Predictor;


use App\Events\BackOffice\Predictor\GamePredictionWasUpdated;
use App\Models\Predictor\Prediction;
use App\Models\Predictor\Ranking;

class UpdateRankingPointsOnGamePredictionWasUpdated
{
    /**
     * Handle the event.
     */
    public function handle(GamePredictionWasUpdated $event): void
    {
        $prediction = Prediction::findOrFail($event->predictionId);
        $ranking    = Ranking::firstOrCreate(
            [
                'predictor_tournament_id' => $prediction->game->predictor_tournament_id,
                'user_id'                 => $prediction->user_id,
            ]
        );

        $ranking->applyPredictionPointsAchieved($prediction->points);
        $ranking->save();
    }
}
