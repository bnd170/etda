<?php

namespace Tests\Unit\Model\Predictor;

use App\Models\Prediction\Prediction;

readonly class PredictionMother
{
    public static function create(
        int $predictorGameId = 1,
        int $userId = 1,
        int $scoreHome = 1,
        int $scoreAway = 1,
        string $selection = 'X'
    ): Prediction
    {
        return new Prediction([
            'predictor_game_id' => $predictorGameId,
            'user_id' => $userId,
            'score_home' => $scoreHome,
            'score_away' => $scoreAway,
            'selection' => $selection,
        ]);
    }

    public static function localWins(): Prediction
    {
        return self::create(scoreAway: 0, selection: '1');
    }

    public static function awayWins(): Prediction
    {
        return self::create(scoreHome: 0, selection: '2');
    }
}
