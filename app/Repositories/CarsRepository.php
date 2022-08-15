<?php

namespace App\Repositories;

use App\Repositories\Contracts\CarsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Car;
use App\Models\Category;

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

    public function getAllWithPaginate($perPage, $page): LengthAwarePaginator
    {
        return $this->model::paginate($perPage, page: $page);
    }

    public function getAllFromCategoryWithPaginate($category, $childrenCategories, $perPage, $page): LengthAwarePaginator
    {
        $categoriesId[] = $category->id;
        foreach ($childrenCategories as $childrenCategory) {
            $categoriesId[] = $childrenCategory->id;
        }
        $cars = $this->model::whereIn('category_id', $categoriesId)->paginate($perPage, page: $page);
        return $cars;
    }

    public function getWeekCars(int $count): Collection
    {
        return $this->model::inRandomOrder()->limit($count)->get();
    }

    public function getCarsWithRelations(): Collection
    {
        return $this->model::with('CarBody','CarClass','CarEngine')->get();
    }

}
