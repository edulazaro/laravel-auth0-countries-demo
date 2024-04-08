<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\CountryServiceInterface;
use App\Services\RestCountriesService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CountryServiceInterface::class, RestCountriesService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
