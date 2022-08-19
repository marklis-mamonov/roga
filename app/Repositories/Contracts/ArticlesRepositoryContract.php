<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Article;

Interface ArticlesRepositoryContract
{
    public function getAllPublished(): Collection;

    public function getAllPublishedWithPaginate($perPage, $page): LengthAwarePaginator;

    public function create($data): Article;

    public function update($article, $data): bool;
    
    public function delete($article): bool;

    public function getNewArticles(int $count): Collection;

    public function getArticlesCount();

    public function getMostLongArticle();

    public function getMostShortArticle();

    public function getMostTaggedArticle();
}