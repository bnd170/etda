<?php

namespace App\Models\Prediction;

use App\Casts\TeamCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $table = 'predictor_games';
    use HasFactory;

    protected $fillable = ['round', 'team_home', 'team_away', 'home_score', 'away_score', 'predictor_tournament_id', 'date'];

    protected $casts = [
        'team_home' => TeamCast::class,
        'team_away' => TeamCast::class,
    ];

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class, 'predictor_tournament_id');
    }

    public function predictions(): HasMany
    {
        return $this->hasMany(Prediction::class);
    }
}
