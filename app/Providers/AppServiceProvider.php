<?php

namespace App\Providers;

use App\Models\Attachment;
use App\Models\Predictor\Prediction;
use App\Policies\PredictionPolicy;
use App\Repositories\PredictionRepository;
use App\Repositories\PredictionRepositoryInterface;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Instagram\Provider;
use SocialiteProviders\Manager\SocialiteWasCalled;

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
            Attachment::class
        );


        $this->app->bind(
            PredictionRepositoryInterface::class,
            PredictionRepository::class
        );


        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('instagram', Provider::class);
        });

        Gate::policy(Prediction::class, PredictionPolicy::class);
    }

    protected function forceHttpsInProd($url): void
    {
        if (env('APP_ENV') === 'production') {
            $url->forceScheme('https');
        }
    }
}
