<?php

namespace Database\Factories\Prediction;

use App\Models\Prediction\Game\Team;
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
            'id' => $this->faker->numberBetween(1, 10),
            'round' => $this->faker->word,
            'team_home' => new Team($this->faker->word, $this->faker->word),
            'team_away' => new Team($this->faker->word, $this->faker->word),
            'home_score' => null,
            'away_score' => null,
            'predictor_tournament_id' => 1,
            'date' => $this->faker->dateTime,
            'status' => $this->faker->word,
        ];
    }
}
