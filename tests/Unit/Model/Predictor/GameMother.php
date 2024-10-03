<?php

namespace Tests\Unit\Model\Predictor;

use App\Models\Prediction\Game;
use Carbon\Carbon;

class GameMother
{
    public static function create(
        string $round = 1,
        string $teamHome = 'Team Home',
        string $teamAway = 'Team Away',
        int $homeScore = 1,
        int $awayScore = 1,
        int $predictorTournamentId = 1,
        \DateTime $date = null,
        Game\Status $status = Game\Status::NotStarted
    ): Game {
        return new Game(
            [
                'id' => 1,
                'round' => $round,
                'team_home' => $teamHome,
                'team_away' => $teamAway,
                'home_score' => $homeScore,
                'away_score' => $awayScore,
                'predictor_tournament_id' => $predictorTournamentId,
                'date' => $date ?? Carbon::now()->toDate(),
                'status' => $status
            ]
        );
    }

    public static function played(): Game
    {
        return self::create(status: Game\Status::Played);
    }
}
