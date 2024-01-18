<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Models\Attachment;
use Orchid\Screen\AsSource;

class News extends Model
{
    use HasFactory, AsSource, Sluggable;

    protected $fillable = [
        'title',
        'content',
        'cover_id',
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

    protected function coverImage(): Attribute
    {
        return Attribute::make(get: fn () => env('CLOUDFLARE_R2_DOMAIN', '').$this->cover?->physicalPath());
    }

    protected function cover(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'cover_id');
    }
}
