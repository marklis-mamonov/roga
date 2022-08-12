<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;
use App\Models\Category;

Interface CategoriesRepositoryContract
{
    public function getParentCategories(): Collection;

    public function getChildrenCategories($parentCategory): Collection;

    public function getAllCategories(): Collection;

    public function getActiveCategories($uri): Collection;
}
