<?php

namespace App\Listeners\BackOffice\Predictor;


use App\Events\BackOffice\Predictor\GamePointsWasDistributed;
use App\Models\Predictor\Ranking;

class UpdateRankingPositionsOnGamePointsWasDistributed
{
    /**
     * Handle the event.
     */
    public function handle(GamePointsWasDistributed $event): void
    {
        $rankings = Ranking::where('predictor_tournament_id', $event->tournamentId)
            ->orderBy('points', 'desc')
            ->get();

        $position = 1;
        foreach ($rankings as $ranking) {
            $ranking->changePosition($position);
            $ranking->save();

            $position++;
        }
    }
}
