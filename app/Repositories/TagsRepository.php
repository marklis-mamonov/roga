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

    public function getMostPopularTag()
    {
        return $tags = $this->model::withCount('articles')->orderBy('articles_count', 'DESC')->first();
    }

    public function getAvgArticles()
    {
        return $tags = $this->model::has('articles')->withCount('articles')->get()->avg('articles_count');
    }
}