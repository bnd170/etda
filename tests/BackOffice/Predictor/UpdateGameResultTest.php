<?php

namespace Tests\BackOffice\Predictor;

use App\Models\Predictor\Game;
use App\Models\Predictor\Tournament;
use App\Models\User;
use App\Services\BackOffice\Predictor\UpdateGameResult;
use Tests\TestCase;

class UpdateGameResultTest extends TestCase
{
    //    use RefreshDatabase;

    protected Tournament $tournament;
    protected Game $game;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user       = User::factory()->create();
        $this->tournament = Tournament::factory()->create(['name' => 'Test Tournament']);
        $this->game       = Game::factory()->create(['predictor_tournament_id' => $this->tournament->id]);
    }

    public function test_it_updates_game_result(): void
    {
        $this->assertNull($this->game->home_score);
        $this->assertNull($this->game->away_score);

        (new UpdateGameResult())($this->game->id, 1, 2);

        $this->assertDatabaseHas('predictor_games', [
            'id'         => $this->game->id,
            'home_score' => 1,
            'away_score' => 2,
        ]);
    }

    public function test_it_update_game_prediction_points(): void
    {
        $prediction = $this->game->predictions()->create(
            [
                'user_id'    => $this->user->id,
                'home_score' => 1,
                'away_score' => 2,
                'selection'  => '2',
            ]
        );

        (new UpdateGameResult())($this->game->id, 1, 2);

        $this->assertDatabaseHas('predictor_predictions', [
            'id'     => $prediction->id,
            'points' => 8,
        ]);
    }

    public function test_it_update_ranking_points_with_prediction_achieved_points(): void
    {
        $this->game->predictions()->create(
            [
                'user_id'    => $this->user->id,
                'home_score' => 1,
                'away_score' => 2,
                'selection'  => '2',
            ]
        );

        (new UpdateGameResult())($this->game->id, 1, 2);

        $this->assertDatabaseHas('predictor_rankings', [
            'user_id'                 => $this->user->id,
            'predictor_tournament_id' => $this->tournament->id,
            'points'                  => 8,
        ]);
    }

    public function test_it_update_ranking_position(): void
    {
        $anotherUser = User::factory()->create();
        $anotherUser2 = User::factory()->create();
        $this->game->predictions()->create(
            [
                'user_id'    => $this->user->id,
                'home_score' => 1,
                'away_score' => 2,
                'selection'  => '2',
            ]
        );
        $this->game->predictions()->create(
            [
                'user_id'    => $anotherUser->id,
                'home_score' => 1,
                'away_score' => 3,
                'selection'  => '2',
            ]
        );
        $this->game->predictions()->create(
            [
                'user_id'    => $anotherUser2->id,
                'home_score' => 3,
                'away_score' => 2,
                'selection'  => '1',
            ]
        );

        (new UpdateGameResult())($this->game->id, 1, 2);

        $this->assertDatabaseHas('predictor_rankings', [
            'user_id'                 => $this->user->id,
            'predictor_tournament_id' => $this->tournament->id,
            'position'                => 1,
            'points'                  => 8,
        ]);

        $this->assertDatabaseHas('predictor_rankings', [
            'user_id'                 => $anotherUser->id,
            'predictor_tournament_id' => $this->tournament->id,
            'position'                => 2,
            'points'                  => 3,
        ]);

        $this->assertDatabaseHas('predictor_rankings', [
            'user_id'                 => $anotherUser2->id,
            'predictor_tournament_id' => $this->tournament->id,
            'position'                => 3,
            'points'                  => -1,
        ]);
    }
}
