<?php

namespace App\Models\Prediction;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prediction extends Model
{
    protected $table = 'predictor_predictions';
    use HasFactory;

    protected $fillable = ['predictor_game_id', 'user_id', 'score_home', 'score_away', 'selection'];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
