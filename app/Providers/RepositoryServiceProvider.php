<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Repositories\Contracts\CarsRepositoryContract;
use App\Repositories\Contracts\TagsRepositoryContract;
use App\Repositories\Contracts\CategoriesRepositoryContract;
use App\Repositories\ArticlesRepository;
use App\Repositories\CarsRepository;
use App\Repositories\TagsRepository;
use App\Repositories\CategoriesRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ArticlesRepositoryContract::class, ArticlesRepository::class);
        $this->app->singleton(CarsRepositoryContract::class, CarsRepository::class);
        $this->app->singleton(TagsRepositoryContract::class, TagsRepository::class);
        $this->app->singleton(CategoriesRepositoryContract::class, CategoriesRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
