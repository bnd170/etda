<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'seasons';

    protected $fillable
        = [
            'year',
            'in_progress',
        ];

    protected $hidden = [
        'id',
        'in_progress'
    ];

    protected $casts = [
        'in_progress' => 'boolean',
    ];
}
