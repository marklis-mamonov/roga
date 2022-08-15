<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;;
use App\Models\Article;

Interface ArticleServiceContract
{
    public function create(Collection $uploadCollection, $tags, $published_at, $imageId);

    public function update(Collection $uploadCollection, Article $article, $tags, $published_at, $imageId);
}