<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interfaces\HasTags;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model implements HasTags
{
    use HasFactory;
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::created(function () {
            Cache::tags('articles')->flush();
        });

        static::updated(function () {
            Cache::tags('articles')->flush();
        });

        static::deleted(function () {
            Cache::tags('articles')->flush();
        });
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany('App\Models\Tag', 'taggable', 'taggables');
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
