<?php

namespace App\Models\Predictor;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ranking extends Model
{
    use HasFactory;

    protected $table = 'predictor_rankings';

    protected $fillable
        = [
            'id',
            'predictor_tournament_id',
            'user_id',
            'points',
            'position',
            'last_position',
            'last_points',
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function applyPredictionPointsAchieved(int $pointsAchieved): void
    {
        $this->last_points = $this->points;
        $this->points += $pointsAchieved;
    }

    public function changePosition(int $position): void
    {
        $this->last_position = $this->position;
        $this->position = $position;
    }
}
