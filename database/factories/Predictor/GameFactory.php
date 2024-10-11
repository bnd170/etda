<?php

namespace Database\Factories\Predictor;

use App\Models\Predictor\Game\Status;
use App\Models\Predictor\Game\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'round' => $this->faker->word,
            'team_home' => (new Team($this->faker->word, $this->faker->word))->toJson(),
            'team_away' => (new Team($this->faker->word, $this->faker->word))->toJson(),
            'home_score' => null,
            'away_score' => null,
            'predictor_tournament_id' => 1,
            'date' => $this->faker->dateTime,
            'status' => Status::NotStarted,
        ];
    }
}
