<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable
        = [
            'name',
            'sheet_name',
            'city',
            'logo',
            'coach',
            'president',
            'description',
            'season_id',
        ];
}
