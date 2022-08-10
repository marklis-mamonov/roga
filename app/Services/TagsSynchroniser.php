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
            if (Tag::where('name', $tagName)->exists()) {
                $tag = Tag::get()->where('name', $tagName)->first();
            } else {
                $tag = Tag::create(['name' => $tagName]);
            }
            if (! $model->tags->pluck('name')->contains($tagName)) {
                $model->tags()->attach($tag);
            }
        }
    }
}