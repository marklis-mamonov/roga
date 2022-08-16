<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::created(function () {
            Cache::tags('tags')->flush();
        });

        static::updated(function () {
            Cache::tags('tags')->flush();
        });

        static::deleted(function () {
            Cache::tags('tags')->flush();
        });
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }
}
