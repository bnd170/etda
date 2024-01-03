<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
