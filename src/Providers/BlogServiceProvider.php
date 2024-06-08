<?php

namespace PG\Blog\Providers;

use PG\Blog\Listeners\CreateArticleVisit;
use PG\Blog\Observers\BlogImageObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use PG\Blog\Events\ArticleShow;
use PG\Blog\Models\BlogImage;
use PG\Blog\Helpers;

class BlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutes();

        $this->loadMigrations();

        $this->loadObservers();

        $this->loadEvents();
    }

    protected function loadRoutes()
    {
        $routes = Helpers::packageDirectory('/routes/api.php');

        $this->loadRoutesFrom($routes);
    }

    protected function loadObservers()
    {
        BlogImage::observe(BlogImageObserver::class);
    }

    protected function loadMigrations()
    {
        $migrations = Helpers::packageDirectory('/migrations');

        $publishes = [
            $migrations => database_path('migrations')
        ];

        $this->publishesMigrations($publishes);
    }

    protected function loadEvents()
    {
        Event::listen(ArticleShow::class, CreateArticleVisit::class);
    }
}
