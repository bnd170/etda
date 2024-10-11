<?php

namespace Tests\Unit\Model\Predictor;

use App\Models\Predictor\Game;
use Carbon\Carbon;

class GameBuilder
{
    public static function create()
    {
        return new self();
    }

    public function __construct(
        private string      $round = 'Grupo A',
        private string      $teamHome = 'Team Home',
        private string      $teamAway = 'Team Away',
        private int         $homeScore = 1,
        private int         $awayScore = 1,
        private int         $predictorTournamentId = 1,
        private \DateTime   $date = new \DateTime(),
        private Game\Status $status = Game\Status::NotStarted
    ) {
    }

    public function homeWins(int $homeScore = 1, int $awayScore = 0): self
    {
        $this->homeScore = $homeScore;
        $this->awayScore = $awayScore;
        $this->status    = Game\Status::Played;

        return $this;
    }

    public function awayWins(int $homeScore = 0, int $awayScore = 1): self
    {
        $this->homeScore = $homeScore;
        $this->awayScore = $awayScore;
        $this->status    = Game\Status::Played;

        return $this;
    }

    public function build(): Game
    {
        return new Game(
            [
                'id'                      => 1,
                'round'                   => $this->round,
                'team_home'               => $this->teamHome,
                'team_away'               => $this->teamAway,
                'home_score'              => $this->homeScore,
                'away_score'              => $this->awayScore,
                'predictor_tournament_id' => $this->predictorTournamentId,
                'date'                    => $this->date ?? Carbon::now()->toDate(),
                'status'                  => $this->status,
            ]
        );
    }
}
