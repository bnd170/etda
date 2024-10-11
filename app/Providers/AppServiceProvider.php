<?php

namespace App\Providers;

use App\Repositories\PredictionRepository;
use App\Repositories\PredictionRepositoryInterface;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void
    {
        $this->forceHttpsInProd($url);
        $this->app->bind(
            \Orchid\Attachment\Models\Attachment::class,
            \App\Models\Attachment::class
        );


        $this->app->bind(
            PredictionRepositoryInterface::class,
            PredictionRepository::class
        );
    }

    protected function forceHttpsInProd($url): void
    {
        if (env('APP_ENV') === 'production') {
            $url->forceScheme('https');
        }
    }
}
