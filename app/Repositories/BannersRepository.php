<?php

namespace App\Repositories;

use App\Repositories\Contracts\BannersRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Banner;
use Illuminate\Support\Facades\Cache;

class BannersRepository implements BannersRepositoryContract
{
    private $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    public function getRandomBanners($count): Collection
    {
        return Cache::tags(['banners', 'images'])->remember('banners', 3600, function() use ($count) {
            return $this->model::inRandomOrder()->with('image')->limit($count)->get();
        });
    }
    
}
