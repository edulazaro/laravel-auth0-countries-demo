<?php

namespace App\Transformers;

class RestCountriesTransformer
{
    /**
     * Transforms a list of countries data into a standardized format.
     *
     * @param array $countriesData
     * @return array
     */
    public static function transform(array $countriesData): array
    {
        return array_reduce($countriesData, function ($carry, $country) {
            $carry[$country['cca2']] = [
                'name' => $country['name']['common'],
                'flag' => $country['flags']['png'],
            ];
            return $carry;
        }, []);
    }
}