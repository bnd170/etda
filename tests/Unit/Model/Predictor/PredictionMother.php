<?php

namespace Tests\Unit\Model\Predictor;

use App\Models\Predictor\Prediction;

readonly class PredictionMother
{
    public static function create(
        int    $predictorGameId = 1,
        int    $userId = 1,
        int    $homeScore = 1,
        int    $awayScore = 1,
        string $selection = 'X'
    ): Prediction
    {
        return new Prediction([
            'predictor_game_id' => $predictorGameId,
            'user_id' => $userId,
            'home_score' => $homeScore,
            'away_score' => $awayScore,
            'selection' => $selection,
        ]);
    }

    public static function localWins(): Prediction
    {
        return self::create(awayScore: 0, selection: '1');
    }

    public static function awayWins(): Prediction
    {
        return self::create(homeScore: 0, selection: '2');
    }
}
