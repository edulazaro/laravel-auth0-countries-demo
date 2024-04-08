<?php

namespace App\Http\Controllers;

use Inertia\Response as InertiaResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Handles the main navigation routes.
 */
class MainController extends Controller
{
    /**
     * Display the  home page.
     *
     * Show the home page and also a message if the auth process fails
     *
     * @return View The view of the home page.
     */
    public function home()
    {
        $params = [];

        if (request()->has('status')) {
            $params['status'] = request()->query('status'); 
        }

        return view('home', $params);
    }

    /**
     * Display the app dashboard.
     *
     * This method uses Inertia.js to render the dashboard.
     *
     * @return InertiaResponse The Inertia response for the dashboard page.
     */
    public function dashboard()
    {
        return inertia('Dashboard');
    }
}