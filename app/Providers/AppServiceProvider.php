<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Services\Contracts\TagsSynchroniserContract;
use App\Services\TagsSynchroniser;

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
    }
}
