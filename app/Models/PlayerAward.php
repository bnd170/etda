<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerAward extends Model
{
    use HasFactory;

    protected $table = 'player_awards';

    protected $fillable
        = [
            'name',
            'image',
            'description',
            'season_id',
            'player_id',
        ];
}
