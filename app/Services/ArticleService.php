<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Services\Contracts\TagsSynchroniserContract;
use App\Services\Contracts\ArticleServiceContract;
use App\Services\Contracts\ImageServiceContract;
use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Repositories\Contracts\ImagesRepositoryContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Article;
use Illuminate\Support\Str;

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

    private function generateUploadData($request, $imageId): array
    {
        $published_at = $request->getPublishedAt($request->is_published);

        return $data = [
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => $published_at,
            'image_id' => $imageId
        ];
    }

    public function create(ArticleRequest $request, TagsRequest $tagsRequest)
    {
        $imageId = $this->imageService->uploadImage($request->file('image'));
        $data = $this->generateUploadData($request, $imageId);
        $article = $this->articlesRepository->create($data);

        if ($request->tags) {
            $tags = $tagsRequest->tagsCollection($request->tags);
            $this->tagsSynchroniser->sync($tags, $article);
        }
    }

    public function update(ArticleRequest $request, TagsRequest $tagsRequest, Article $article)
    {
        if (! (($article->image_id) && ($request->file('image') === null))) {
            $imageId = $this->imageService->uploadImage($request->file('image'));
        } else {
            $imageId = $article->image_id;
        }
        $data = $this->generateUploadData($request, $imageId);
        $article = $this->articlesRepository->update($article, $data);

        if ($request->tags) {
            $tags = $tagsRequest->tagsCollection($request->tags);
            $this->tagsSynchroniser->sync($tags, $article);
        }
    }
}