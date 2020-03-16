<?php

namespace App\Repositories\Providers;
use Illuminate\Support\ServiceProvider;

class PostRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\PostRepositoryInterface',
            'App\Repositories\Eloquent\PostRepository'

        );
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
