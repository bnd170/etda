<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $hidden = [
        'team_id'
    ];

    protected $fillable
        = [
            'name',
            'surname',
            'image',
            'position',
            'number',
            'classification',
            'description',
            'age',
            'team_id',
        ];
}
