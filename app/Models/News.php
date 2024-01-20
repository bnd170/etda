<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class News extends Model
{
    use HasFactory, AsSource, Sluggable, Filterable;

    protected $fillable = [
        'title',
        'content',
        'cover_id',
    ];

    protected $allowedSorts = [
        'title',
        'created_at',
        'updated_at'
    ];


    protected $allowedFilters = [
        'title' => Like::class,
    ];

    protected $appends = [
        'cover_image',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title'],
            ],
        ];
    }

    protected function adminCreatedAt(): Attribute
    {
        return Attribute::make(get: fn () => Carbon::create($this->created_at)->format('Y-m-d H:i:s'));
    }


    protected function adminUpdatedAt(): Attribute
    {
        return Attribute::make(get: fn () => Carbon::create($this->updated_at)->format('Y-m-d H:i:s'));
    }

    protected function coverImage(): Attribute
    {
        return Attribute::make(get: fn () => $this->cover?->url);
    }

    protected function cover(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'cover_id');
    }
}
