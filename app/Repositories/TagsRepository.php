<?php

namespace App\Repositories;

use App\Repositories\Contracts\TagsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    private $model;

    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

    public function createOrGet($name): Tag
    {
        return $this->model::firstOrCreate(['name' => $name]);
    }

    public function attach($taggableModel, $tag)
    {
        $taggableModel->tags()->attach($tag);
    }
}