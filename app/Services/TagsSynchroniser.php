<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\Interfaces\HasTags;
use App\Models\Article;
use App\Models\Tag;

class TagsSynchroniser
{
    public function sync(Collection $tags, HasTags $model)
    {
        foreach ($tags as $tagName)
        {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            if (! $model->tags->pluck('name')->contains($tagName)) {
                $model->tags()->attach($tag);
            }
        }
    }
}