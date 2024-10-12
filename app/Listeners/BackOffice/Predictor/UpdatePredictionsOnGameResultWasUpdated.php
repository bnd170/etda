<?php

namespace App\Listeners\BackOffice\Predictor;


use App\Events\BackOffice\Predictor\GamePointsWasDistributed;
use App\Events\BackOffice\Predictor\GameResultWasUpdated;
use App\Models\Predictor\Game;
use App\Services\Predictor\PointsDistributor;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();

        try {
            $this->pointsDistributor->distributeFor($game);

            event(new GamePointsWasDistributed($game->predictor_tournament_id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
