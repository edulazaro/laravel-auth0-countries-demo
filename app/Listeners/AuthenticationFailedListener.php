<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Auth0\Laravel\Events\AuthenticationFailed;

class AuthenticationFailedListener
{
    /**
     * Handle the event.
     *
     * @param  AuthenticationFailed  $event
     * @return void
     */
    public function handle(AuthenticationFailed $event)
    {
        // Log the error or perform any other necessary actions
        Log::error('Authentication failed', ['exception' => $event->exception->getMessage()]);

        // Redirect to the homepage
        Redirect::to(route('home', ['status' => 'unauthorized']))->send();
    }
}