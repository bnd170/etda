<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Team extends Model
{
    use HasFactory, AsSource, Filterable;

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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->with = ['players', 'awards'];
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class)->orderBy('number');
    }

    public function awards(): HasMany
    {
        return $this->hasMany(TeamAward::class);
    }
}
