<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamAward extends Model
{
    use HasFactory;

    protected $table = 'team_awards';

    protected $fillable
        = [
            'name',
            'image',
            'description',
            'season_id',
            'team_id',
        ];
}
