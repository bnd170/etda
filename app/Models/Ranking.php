<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ranking extends Model
{
    use HasFactory;

    protected $table = 'rankings';
    public $timestamps = false;

    protected $appends = [
        'total_games',
    ];

    protected $fillable
        = [
            'season_id',
            'team_id',
            'wins',
            'losses',
            'ties',
            'points',
            'goals_for',
            'goals_against',
            'goal_differential',
        ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function totalGames(): Attribute
    {
        return new Attribute(get: fn () => $this->wins + $this->losses + $this->ties);
    }
}
