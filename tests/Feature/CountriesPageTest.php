<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Auth0\SDK\Configuration\SdkConfiguration;
use Auth0\Laravel\Users\StatefulUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use App\Models\User;

class CountriesPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test unauthenticated user redirect to Auth0 login page
     */
    public function test_unauthenticated_user_gets_a_302_response(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('countries'));

        $response->assertStatus(302);
    }
 
    /**
     * Test authenticated user access
     */
    public function test_authenticated_user_gets_a_successful_response(): void
    {
        $response = $this->get('/');

        $secret = uniqid();

        config([
            'auth0.AUTH0_CONFIG_VERSION' => 2,
            'auth0.guards.default.strategy' => SdkConfiguration::STRATEGY_REGULAR,
            'auth0.guards.default.domain' => uniqid() . '.auth0.com',
            'auth0.guards.default.clientId' => uniqid(),
            'auth0.guards.default.clientSecret' =>  $secret,
            'auth0.guards.default.cookieSecret' => uniqid(),
        ]);

        $user = new StatefulUser(['sub' => uniqid('auth0|')]);

        $response = $this->actingAs($user)->get(route('countries'));

        $response->assertStatus(200);
    }
}
