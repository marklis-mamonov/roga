<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Services\Contracts\TagsSynchroniserContract;
use App\Services\Contracts\ArticleServiceContract;
use App\Services\Contracts\ImageServiceContract;
use App\Services\TagsSynchroniser;
use App\Services\ArticleService;
use App\Services\ImageService;
use App\Repositories\Contracts\CategoriesRepositoryContract;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagsSynchroniserContract::class, TagsSynchroniser::class);
        $this->app->singleton(ArticleServiceContract::class, ArticleService::class);
        $this->app->singleton(ImageServiceContract::class, ImageService::class);
    }

    public function categories()
    {
    }
    

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap([
            'article' => 'App\Models\Article',
        ]);

        Paginator::defaultView('pagination::custom');

        $categoryRepository = app(CategoriesRepositoryContract::class);
        $categories = $categoryRepository->getAllCategories();
        View::share('categories', $categories);

        if (Route::currentRouteName() == "cars.index") {
            $activeCategories = $categoryRepository->getActiveCategories($_SERVER['REQUEST_URI']);
        } else {
            $activeCategories = collect([]);
        }
        View::share('activeCategories', $activeCategories);
    }
}
