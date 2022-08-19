<?php

namespace App\Services;

use App\Repositories\Contracts\CarsRepositoryContract;
use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Repositories\Contracts\TagsRepositoryContract;

class StatisticsService
{
    protected $carsRepository;
    protected $articlesRepository;
    protected $tagsRepository;

    public function __construct(CarsRepositoryContract $carsRepository, ArticlesRepositoryContract $articlesRepository, TagsRepositoryContract $tagsRepository)
    {
        $this->carsRepository = $carsRepository;
        $this->articlesRepository = $articlesRepository;
        $this->tagsRepository = $tagsRepository;
    }

    public function getStatistics()
    {
        $carsCount = $this->carsRepository->getCarsCount();
        $articlesCount = $this->articlesRepository->getArticlesCount();
        $mostPopularTag = $this->tagsRepository->getMostPopularTag();
        $mostLongArticle = $this->articlesRepository->getMostLongArticle();
        $mostShortArticle = $this->articlesRepository->getMostShortArticle();
        $avgArticles = $this->tagsRepository->getAvgArticles();
        $mostTaggedArticle = $this->articlesRepository->getMostTaggedArticle();

        return [
            ['carsCount' => $carsCount,
            'articlesCount' => $articlesCount,
            'mostPopularTag' => $mostPopularTag->name. ", Id: " . $mostPopularTag->id,
            'mostLongArticle' => $mostLongArticle->title . ", Id: " . $mostLongArticle->id . ", " . mb_strlen($mostLongArticle->body) . " симв.",
            'mostShortArticle' => $mostShortArticle->title . ", Id: " . $mostShortArticle->id . ", " . mb_strlen($mostShortArticle->body) . " симв.",
            'avgArticles' => $avgArticles,
            'mostTaggedArticle' => $mostTaggedArticle->title . ", Id: " . $mostTaggedArticle->id. ", " . $mostTaggedArticle->tags_count . " тэгов"],
        ];
    }
}