<?php

namespace Tests\Integration;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

use App\Services\RestCountriesService;
use Illuminate\Support\Facades\App;

class RestCountriesServiceTest extends TestCase
{
    public function testArrayOfCountriesIsReturned()
    {
        // Mock the external API call
        Http::fake([
            'https://restcountries.com/v3.1/all' => Http::response([
                ['cca2' => 'ES', 'name' => ['common' => 'Spain'], 'flags' => ['png' => 'https://flagcdn.com/w320/es.png']],
                ['cca2' => 'CY', 'name' => ['common' => 'Cyprus'], 'flags' => ['png' => 'https://flagcdn.com/w320/cy.png']],
            ], 200),
        ]);

        $countryService = App::make(RestCountriesService::class);

        $countries = $countryService->all();

        $this->assertIsArray($countries);
        $this->assertCount(2, $countries);
        $this->assertEquals('Spain', $countries['ES']['name']);
        $this->assertEquals('Cyprus', $countries['CY']['name']);
        $this->assertEquals('https://flagcdn.com/w320/es.png', $countries['ES']['flag']);
        $this->assertEquals('https://flagcdn.com/w320/cy.png', $countries['CY']['flag']);
    }
}