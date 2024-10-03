<?php

namespace App\Models\Prediction;

use App\Casts\TeamCast;
use App\Models\Prediction\Game\Status;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $table = 'predictor_games';
    use HasFactory;

    protected $fillable
        = [
            'id',
            'round',
            'team_home',
            'team_away',
            'home_score',
            'away_score',
            'predictor_tournament_id',
            'date',
            'status'
        ];

    protected $casts
        = [
            'team_home' => TeamCast::class,
            'team_away' => TeamCast::class,
            'status' => Status::class
        ];

    public static function create(
        string $round,
        int $predictor_tournament_id,
        Game\Team $team_home,
        Game\Team $team_away,
        DateTime $date
    ): self {
        $game = new self();
        $game->round = $round;
        $game->predictor_tournament_id = $predictor_tournament_id;
        $game->team_home = $team_home;
        $game->team_away = $team_away;
        $game->date = $date;
        $game->status = Status::NotStarted;

        return $game;
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class, 'predictor_tournament_id');
    }

    public function predictions(): HasMany
    {
        return $this->hasMany(Prediction::class, 'predictor_game_id');
    }
}
