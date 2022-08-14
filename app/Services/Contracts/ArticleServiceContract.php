<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;;
use App\Models\Article;

Interface ArticleServiceContract
{
    public function create(ArticleRequest $request, TagsRequest $tagsRequest);

    public function update(ArticleRequest $request, TagsRequest $tagsRequest, Article $article);
}