<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Services\Contracts\TagsSynchroniserContract;
use App\Services\Contracts\ArticleServiceContract;
use App\Services\Contracts\ImageServiceContract;
use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Repositories\Contracts\ImagesRepositoryContract;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ArticleService implements ArticleServiceContract
{

    protected $articlesRepository;
    protected $imageService;
    protected $tagsSynchroniser;

    public function __construct(ArticlesRepositoryContract $articlesRepository, ImageServiceContract $imageService, TagsSynchroniserContract $tagsSynchroniser)
    {
        $this->articlesRepository = $articlesRepository;
        $this->imageService = $imageService;
        $this->tagsSynchroniser = $tagsSynchroniser;
    }

    private function generateUploadData($uploadCollection, $published_at, $imageId): array
    {
        return $data = [
            'slug' => Str::slug($uploadCollection->get('title')),
            'title' => $uploadCollection->get('title'),
            'description' => $uploadCollection->get('description'),
            'body' => $uploadCollection->get('body'),
            'published_at' => $published_at,
            'image_id' => $imageId
        ];
    }

    public function create(Collection $uploadCollection, $tags, $published_at, $imageId)
    {
        $data = $this->generateUploadData($uploadCollection, $published_at, $imageId);
        try {
            DB::beginTransaction();
            $article = $this->articlesRepository->create($data);
            if ($tags) {
                $this->tagsSynchroniser->sync($tags, $article);
            }
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
        }
    }

    public function update(Collection $uploadCollection, Article $article, $tags, $published_at, $imageId)
    {
        $data = $this->generateUploadData($uploadCollection, $published_at, $imageId);
        try {
            DB::beginTransaction();
            $this->articlesRepository->update($article, $data);
            if ($tags) {
                $this->tagsSynchroniser->sync($tags, $article);
            }
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
        }
    }
}