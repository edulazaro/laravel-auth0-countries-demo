<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

use App\Contracts\CountryServiceInterface;

/**
 * Controller for handling country-related operations.
 */
class CountryController extends Controller
{

    /** @var CountryServiceInterface Service which handles countries */
    protected $countryService;

    /**
     * Constructor
     *
     * @param CountryServiceInterface $countryService The service which handles countries .
     */
    public function __construct(CountryServiceInterface $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * Display the list of countries.
     *
     * Retrieve the list of countries from the country service or the cache and
     * return a view with them or an error if something unexpected happens.
     *
     * @return \Inertia\Response The Inertia view with the countries or an error message.
     */
    public function index()
    {
        try {

            $countries = Cache::remember('countries', 600, function () {
                return $this->countryService->all();
            });

            return inertia('Countries/Index', ['countries' => $countries]);

        } catch (Exception $e) {

            Log::error('Error fetching countries: ' . $e->getMessage());
            return inertia('Countries/Index', ['error' => __('Something happened when fetching the countries')]);
        }
    }
}
