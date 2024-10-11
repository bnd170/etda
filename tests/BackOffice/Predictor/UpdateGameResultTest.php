<?php

namespace Tests\BackOffice\Predictor;


use App\Models\Predictor\Game;
use App\Models\Predictor\Prediction;
use App\Models\Predictor\Tournament;
use App\Models\User;
use App\Services\BackOffice\Predictor\UpdateGameResult;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class UpdateGameResultTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_updates_game_result(): void
    {
        $tournament = Tournament::factory()->create([
                                                        'name' => 'Test Tournament',
                                                    ]);
        $user = User::factory()->create();
        $game = Game::factory()->create([
                                            'predictor_tournament_id' => $tournament->id,
                                        ]);
        $prediction = $game->predictions()->create([
                                                       'user_id' => $user->id,
                                                       'home_score' => 1,
                                                       'away_score' => 2,
                                                       'selection' => '2',
                                                   ]);

        $this->assertNull($game->home_score);
        $this->assertNull($game->away_score);

        (new UpdateGameResult())($game->id, 1, 2);

        $resultGame = Game::findOrFail($game->id);
        $resultPrediction = Prediction::findOrFail($prediction->id);
        $this->assertEquals(1, $resultGame->home_score);
        $this->assertEquals(2, $resultGame->away_score);
        $this->assertEquals(8, $resultPrediction->points);
    }
}
