<?php

namespace App\Models;

use App\Casts\GameStatsCast;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory, Sluggable;
    public $timestamps = false;

    protected $table = 'games';

    protected $casts = [
        'date' => 'datetime',
        'stats' => GameStatsCast::class,
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['homeTeam.name', 'awayTeam.name', 'season.year', 'round'],
            ],
        ];
    }

    protected $fillable
        = [
            'date',
            'location',
            'state',
            'status',
            'home_team_id',
            'away_team_id',
            'home_team_score',
            'away_team_score',
            'season_id',
            'sheet_id',
            'round',
            'stats',
        ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->with = ['homeTeam', 'awayTeam'];
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function scopePending(Builder $query): void
    {
        $query->where('status', 'pending');
    }

    public function scopeNotPending(Builder $query): void
    {
        $query->where('status', '!=', 'pending');
    }
}
