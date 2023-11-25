<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $table = 'rankings';

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
}
