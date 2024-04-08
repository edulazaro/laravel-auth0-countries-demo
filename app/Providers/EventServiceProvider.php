<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Listeners\AuthenticationFailedListener;
use Auth0\Laravel\Events\AuthenticationFailed;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        AuthenticationFailed::class => [
            AuthenticationFailedListener::class,
        ],
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
}