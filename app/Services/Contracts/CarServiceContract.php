<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;
use App\Models\Car;

Interface CarServiceContract
{
    public function apiCreate(Collection $uploadCollection);

    public function apiUpdate(Collection $uploadCollection, Car $car);
}