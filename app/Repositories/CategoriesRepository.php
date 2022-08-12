<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoriesRepositoryContract;
use Illuminate\Support\Collection;
use App\Models\Category;

class CategoriesRepository implements CategoriesRepositoryContract
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getParentCategories(): Collection
    {
        return $this->model::get()->whereNull('parent_id')->sortBy('sort');
    }

    public function getChildrenCategories($parentCategory): Collection
    {
        return $this->model::get()->where('parent_id', $parentCategory)->sortBy('sort');
    }

    public function getAllCategories(): Collection
    {
        $categories = $this->getParentCategories();
        foreach ($categories as $category) {
            $category->childrenCategories = $this->getChildrenCategories($category->id);
        }
        return $categories;
    }

    public function getActiveCategories($uri): Collection
    {
        $activeCategorySlug = str_replace("/catalog/", "", $uri);
        $activeCategory = $this->model::get()->where('slug', $activeCategorySlug)->first();
        if ($activeCategory->parent_id) {
            $activeParentCategory = $this->model::get()->where('id', $activeCategory->parent_id)->first();
            $activeParentCategorySlug = $activeParentCategory->slug;
        } else {
            $activeParentCategorySlug = null;
        }
        return collect([$activeCategorySlug, $activeParentCategorySlug]);
    }
}
