<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Portal\Domain\SeasonImporter;
use Portal\Infrastructure\SeasonImporterXls;

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
        $this->app->bind(SeasonImporter::class, SeasonImporterXls::class);
    }

    protected function forceHttpsInProd($url): void
    {
        if (env('APP_ENV') === 'production') {
            $url->forceScheme('https');
        }
    }
}
