<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\Interfaces\HasTags;
use App\Models\Article;
use App\Models\Tag;
use App\Repositories\Contracts\TagsRepositoryContract;

class TagsSynchroniser
{

    protected $tagsRepository;

    public function __construct(TagsRepositoryContract $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function sync(Collection $tags, HasTags $model)
    {

        foreach ($tags as $tagName)
        {
            $tag = $this->tagsRepository->createOrGet($tagName);
            if (! $model->tags->pluck('name')->contains($tagName)) {
                $this->tagsRepository->attach($model, $tag);
            }
        }
    }
}