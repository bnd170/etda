<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->with = ['season'];
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
