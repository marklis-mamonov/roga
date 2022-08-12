<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Car;

Interface CarsRepositoryContract
{
    public function getAll(): Collection;
    
    public function getAllWithPaginate(): LengthAwarePaginator;
    
    public function getAllFromCategoryWithPaginate($category, $childrenCategories): LengthAwarePaginator;

    public function getWeekCars(): Collection;

    public function getCarsWithRelations(): Collection;
}
