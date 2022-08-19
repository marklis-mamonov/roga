<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Tag;

Interface TagsRepositoryContract
{
    public function createOrGet($name): Tag;

    public function attach($taggableModel, $tag);

    public function getMostPopularTag();

    public function getAvgArticles();
}