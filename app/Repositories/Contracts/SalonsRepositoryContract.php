<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

Interface SalonsRepositoryContract
{
    public function getSalons();

    public function getRandomSalons($count);
}