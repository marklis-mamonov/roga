<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Car;

Interface CarsRepositoryContract
{
    public function getAll(): Collection;
    
    public function getAllWithPaginate($perPage, $page): LengthAwarePaginator;
    
    public function getAllFromCategoryWithPaginate($category, $childrenCategories, $perPage, $page): LengthAwarePaginator;

    public function getWeekCars(int $count): Collection;

    public function getCarsWithRelations(): Collection;

    public function getCarsCount();
}
