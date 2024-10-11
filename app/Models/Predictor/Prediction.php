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
        return $this->belongsTo(Game::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isPredictionAccurate(string $gameWinner): bool
    {
        return $this->selection === $gameWinner;
    }

    public function isScoreAccurate(mixed $gameHomeScore, mixed $gameAwayScore): bool
    {
        return $this->home_score === $gameHomeScore
            && $this->away_score === $gameAwayScore;
    }

    public function addPoints(int $points): void
    {
        $this->points += $points;
    }

    public function subtractPoints(int $points): void
    {
        $this->points -= $points;
    }
}
