<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Module\Url\Repositories\UrlRespository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UrlRespository::class, function () {
            return new UrlRespository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
