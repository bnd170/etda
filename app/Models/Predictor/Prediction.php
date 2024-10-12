<?php

namespace App\Models\Predictor;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prediction extends Model
{
    protected $table = 'predictor_predictions';
    use HasFactory;

    protected $fillable = ['predictor_game_id', 'user_id', 'home_score', 'away_score', 'selection'];
    protected $hidden = ['predictor_game_id', 'user_id'];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'predictor_game_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updatePoints(Game $game): void
    {
        $this->isPredictionAccurate($game->getSelectionWinner()) ? $this->addPoints(3) : $this->subtractPoints(1);

        if ($this->isScoreAccurate($game->home_score, $game->away_score)) {
            $this->addPoints(5);
        }
    }

    private function isPredictionAccurate(string $gameWinner): bool
    {
        return $this->selection === $gameWinner;
    }

    private function isScoreAccurate(mixed $gameHomeScore, mixed $gameAwayScore): bool
    {
        return $this->home_score === $gameHomeScore
            && $this->away_score === $gameAwayScore;
    }

    private function addPoints(int $points): void
    {
        $this->points += $points;
    }

    private function subtractPoints(int $points): void
    {
        $this->points -= $points;
    }
}
