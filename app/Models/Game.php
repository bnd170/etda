<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable
        = [
            'date',
            'location',
            'home_team_id',
            'away_team_id',
            'home_team_score',
            'away_team_score',
            'season_id',
        ];
}
