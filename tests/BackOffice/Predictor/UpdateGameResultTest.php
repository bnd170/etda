<?php

namespace Tests\BackOffice\Predictor;


use App\Models\Game;
use App\Models\User;
use App\Services\BackOffice\Predictor\UpdateGameResult;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class UpdateGameResultTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_updates_game_result()
    {
        $user = User::factory()->create();
        $game = Game::factory()->create();
        $prediction = $game->predictions()->create([
            'user_id' => $user->id,
            'home_score' => 1,
            'away_score' => 2,
            'selection' => '2',
        ]);

        $this->assertNull($game->home_score);
        $this->assertNull($game->away_score);

        (new UpdateGameResult())->__invoke($game->id, 1, 2);

        $this->assertEquals(1, $game->home_score);
        $this->assertEquals(2, $game->away_score);
        $this->assertEquals(8, $prediction->points);
    }
}
