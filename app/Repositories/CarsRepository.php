<?php

namespace App\Repositories;

use App\Repositories\Contracts\CarsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

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
        return $cars = Cache::tags(['cars', 'images'])->remember('catalog|' . $category->id, 3600, function () use ($categoriesId, $perPage, $page) {
            return $this->model::whereIn('category_id', $categoriesId)->with('image')->paginate($perPage, page: $page);
        });
    }

    public function getWeekCars(int $count): Collection
    {
        return Cache::tags(['cars', 'images'])->remember('weekCars|' . $count, 3600, function() use ($count) {
            return $this->model::inRandomOrder()->with('image')->limit($count)->get();
        });
    }

    public function getCarsWithRelations(): Collection
    {
        return $this->model::with('CarBody','CarClass','CarEngine')->get();
    }

    public function getCar($id)
    {
        return Cache::tags(['cars', 'images'])->remember('car' . $id, 3600, function() use ($id) {
            return $this->model::with('carBody', 'carClass', 'carEngine', 'image', 'images')->find($id);
        });
    }

    public function getCarsCount()
    {
        return $this->model::get()->count();
    }

    public function apiCreate($data): Car
    {
        return $this->model::create($data);
    }

    public function apiUpdate($id, $data)
    {
        return $this->model::findOrFail($id)->update($data);
    }

    public function apiDelete($id)
    {
        return $this->model::findOrFail($id)->delete();
    }

}
