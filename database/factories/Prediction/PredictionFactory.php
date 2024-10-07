<?php

namespace Database\Factories\Prediction;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PredictionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'predictor_game_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'home_score' => $this->faker->numberBetween(0, 5),
            'away_score' => $this->faker->numberBetween(0, 5),
            'selection' => $this->faker->randomElement(['1', 'X', '2']),
        ];
    }

    public function madeBy(User $user): self
    {
        return $this->state(fn() => ['user_id' => $user->id]);
    }
}
