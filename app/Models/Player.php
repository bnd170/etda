<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Player extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $table = 'players';
    public $timestamps = false;


    protected $allowedSorts = [
        'team_id',
        'name',
        'surname',
        'classification'
    ];

    protected $hidden
        = [
            'team_id',
        ];

    protected $appends
        = [
            'image',
        ];

    protected $fillable
        = [
            'name',
            'surname',
            'image_id',
            'position',
            'number',
            'classification',
            'description',
            'age',
            'team_id',
        ];

    public function team(): HasOne
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }

    public function attachment(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'image_id');
    }

    public function image(): Attribute
    {
        return Attribute::make(get: fn() => $this->attachment?->url);
    }
}
