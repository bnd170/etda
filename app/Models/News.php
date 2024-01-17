<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class News extends Model
{
    use HasFactory, AsSource;

    protected function adminCreatedAt(): Attribute
    {
        return new Attribute(get: fn () => Carbon::create($this->created_at)->format('Y-m-d H:i:s'));
    }
}
