<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::created(function () {
            Cache::tags('images')->flush();
        });

        static::updated(function () {
            Cache::tags('images')->flush();
        });

        static::deleted(function () {
            Cache::tags('images')->flush();
        });
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
