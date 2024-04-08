<?php

namespace App\Contracts;

/**
 * Interface for the services providing country data.
 */
interface CountryServiceInterface
{
    /**
     * Get all the countries.
     *
     * @return array An array of countries.
     */
    public function all(): array;
}