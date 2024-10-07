<?php

namespace App\Services\BackOffice\Predictor;

use App\Events\BackOffice\Predictor\GameResultWasUpdated;
use App\Models\Prediction\Game;

class UpdateGameResult
{
    public function __invoke(int $gameId, int $homeScore, int $awayScore): void
    {
        $game = Game::findOrFail($gameId);

        $game->finishGame($homeScore, $awayScore);
        $game->save();

        event(new GameResultWasUpdated($gameId, $homeScore, $awayScore));
    }
}
