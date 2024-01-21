<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
            'logo_id',
            'coach',
            'president',
            'description',
            'season_id',
        ];

    protected $appends = [
        'logo',
        'cover',
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

    public function season(): HasOne
    {
        return $this->hasOne(Season::class, 'id', 'season_id');
    }

    public function logo(): Attribute
    {
        return Attribute::make(get: fn () => $this->logoAttachment?->url);
    }

    public function cover(): Attribute
    {
        return Attribute::make(get: fn () => $this->coverAttachment?->url);
    }

    public function logoAttachment(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'logo_id');
    }

    public function coverAttachment(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'cover_id');
    }

}
