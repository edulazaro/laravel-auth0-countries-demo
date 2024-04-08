<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Exception;

use App\Transformers\RestCountriesTransformer;
use App\Contracts\CountryServiceInterface;

/**
 * Service class for fetching country data from the
 * RestCountries API (https://restcountries.com/v3.1/all)
 *
 * An implementation of the CountryServiceInterface
 */
class RestCountriesService implements CountryServiceInterface
{
    /** @var string $baseUrl  The base URL of the API */
    protected $baseUrl = 'https://restcountries.com/v3.1';

    /**
     * Fetch an transform the full list of countroes from the API
     *
     * Makes a request to the /v3.1/all endpoint to get the full list of countries
     * and then transformas the result to provide a standarized response, so the API
     * can be easily replaceable.
     *
     * @return array The transformed countries data.
     * 
     * @throws Exception if any error occurs during the process.
     */
    public function all(): array
    {
        try {

            // Perform several attempts
            $response = Http::timeout(3)->retry(3, function (int $attempt) {
                return $attempt * 200;
            })->get("{$this->baseUrl}/all");

            if ($response->successful()) {
                return RestCountriesTransformer::transform($response->json());
            }

            if ($response->clientError()) {
                throw new Exception('Client error encountered while fetching countries data.');
            }

            if ($response->serverError()) {
                throw new Exception('Server error encountered while fetching countries data.');
            }

        } catch (RequestException $e) {
            // Network related errors
            throw new Exception('It was not possible to fetch the countries because of a network error: ' . $e->getMessage());
        } catch (Exception $e) {
            // Any other error
            throw new Exception('An unexpected error happaned: ' . $e->getMessage());
        }
    }
}