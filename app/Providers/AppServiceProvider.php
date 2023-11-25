<?php

namespace App\Providers;

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
    public function boot(): void
    {
        $this->app->bind(SeasonImporter::class, SeasonImporterXls::class);
    }
}
