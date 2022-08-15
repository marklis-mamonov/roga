<?php

namespace App\Repositories;

use App\Repositories\Contracts\ArticlesRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;

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
        return $cars = Cache::tags(['articles', 'tags', 'images'])->remember('articles' . $page, 3600, function () use ($perPage, $page) {
            return $this->model::latest('published_at')->with('image', 'tags')->whereNotNull('published_at')->paginate($perPage, page: $page);
        });
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
        return Cache::tags(['articles', 'tags', 'images'])->remember('newArticles', 3600, function() use ($count) {
            return $this->model::latest('published_at')->with('image', 'tags')->whereNotNull('published_at')->limit($count)->get();
        });
    }

    public function getArticle($slug) {
        return Cache::tags(['articles', 'tags', 'images'])->remember('article' . $slug, 3600, function() use ($slug) {
            return $this->model::with('image', 'tags')->get()->where('slug', $slug)->first();
        });
    }
}