<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Banner;

Interface BannersRepositoryContract
{
    public function getRandomBanners(int $count): Collection;
}