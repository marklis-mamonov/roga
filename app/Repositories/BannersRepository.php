<?php

namespace App\Repositories;

use App\Repositories\Contracts\BannersRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Banner;

class BannersRepository implements BannersRepositoryContract
{
    private $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    public function getRandomBanners($count): Collection
    {
        return $this->model::inRandomOrder()->limit($count)->get();
    }
    
}
