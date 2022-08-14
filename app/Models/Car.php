<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    public function getRouteKeyName()
    {
        return 'id';
    }

    protected $guarded = [];
    
    public function carClass()
    {
        return $this->belongsTo(CarClass::class);
    }
    
    public function carBody()
    {
        return $this->belongsTo(CarBody::class);
    }
    
    public function carEngine()
    {
        return $this->belongsTo(CarEngine::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
