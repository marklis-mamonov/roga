<?php

namespace App\Repositories;

use App\Repositories\Contracts\CarsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Car;

class CarsRepository implements CarsRepositoryContract
{
    private $model;

    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model::get();
    }

    public function getAllWithPaginate(): LengthAwarePaginator
    {
        return $this->model::paginate(16);
    }

    public function getWeekCars(): Collection
    {
        return $this->model::inRandomOrder()->limit(4)->get();
    }

    public function getCarsWithRelations(): Collection
    {
        return $this->model::with('CarBody','CarClass','CarEngine')->get();
    }

}