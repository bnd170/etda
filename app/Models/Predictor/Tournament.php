<?php

namespace App\Models\Predictor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tournament extends Model
{
    protected $table = 'predictor_tournaments';
    use HasFactory;

    protected $fillable = ['name'];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'predictor_tournament_id');
    }
}
