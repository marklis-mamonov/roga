<?php

namespace App\Repositories;

use App\Repositories\Contracts\ArticlesRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Article;

class ArticlesRepository implements ArticlesRepositoryContract
{
    private $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function getAllPublished(): Collection
    {
        return $this->model::latest('published_at')->whereNotNull('published_at')->get();
    }

    public function getAllPublishedWithPaginate($perPage, $page): LengthAwarePaginator
    {
        return $this->model::latest('published_at')->whereNotNull('published_at')->paginate($perPage, page: $page);
    }

    public function create($data): Article
    {
        return $this->model::create($data);
    }

    public function update($article, $data): bool
    {
        return $article->update($data);
    }

    public function delete($article): bool
    {
        return $article->delete();
    }

    public function getNewArticles(int $count): Collection
    {
        return $this->model::latest('published_at')->whereNotNull('published_at')->limit($count)->get();
    }
}