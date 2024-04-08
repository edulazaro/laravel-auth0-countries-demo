This small app uses Auth0 for user authorization and uses the API `https://restcountries.com/` v3.1 to show a list of countries along with the flag for each one.

## Introduction

Using Auth0 is a straight forward process with the official Laravel package. However, to handle the errors, the `App\Listeners\AuthenticationFailedListener` listener is required, listening to the `Auth0\Laravel\Events\AuthenticationFailed` event, as otherwise the callback URL will be displayed with a standard Laravel error.

Regaring the API, the `App\Services\RestCountriesService` is provided, implementing the `App\Contracts\CountryServiceInterface` so it's easily replaceable by another implementation on the `\pp\Providers\AppServiceProvider`.

To make the replacement easier, the `App\Transformers\RestCountriesTransformer` is provided, so an array with the name and the flag of each country is returned instead of the API data.

The app uses Inertia. The `index` method of the `App\Http\Controllers\CountryController` uses an implementation of the `App\Contracts\CountryServiceInterface` to get the list of countries. The method renders the `Pages\Countries\Index` component. The component will render the counstries, stored on the `countries` prop, or an error in case something unexpected happened. To render each country, the `Pages\Countries\Components\Country.vue` is provided.

## Running without Docker

First, clone the `git@github.com:edulazaro/laravel-countries-auth0.git` repo. 

Inside the project directory, rename the `.env.example` file as `.env`:

Install PHP dependencies:

```bash
composer install
```

Generate the app key:

```bash
php artisan key:generate
```

Install the node dependencies:

```bash
npm install
```

If you want to use an existing Auth0 app, follow these steps:

1. Rename the `.auth0.api.json.example` file as `.auth0.api.json` and input the API `id`.
2. Rename the `.auth0.app.json.example` file as `.auth0.app.json` and fill the `client_id`, `client_secret` and the `signing_keys`.

If you want to use a new Auth0 app, follow these steps to generate the `.auth0.api.json` and `.auth0.app.json` files:

1. If you don't have it, download the Auth0 SDK:
	```bash
	curl -sSfL https://raw.githubusercontent.com/auth0/auth0-cli/main/install.sh | sh -s -- -b .
	```

2. Then login to Auth0:
  ```bash
  ./auth0 login
  ```

3. Create an Auth0 app:
	```bash
	./auth0 apps create \
		--name "Countries App" \
		--type "regular" \
		--auth-method "post" \
		--callbacks "http://localhost:8000/callback" \
		--logout-urls "http://localhost:8000" \
		--reveal-secrets \
		--no-input \
		--json > .auth0.app.json
	```

4. Create an Auth0 API:
	```bash
	./auth0 apis create \
		--name "Countries App API" \
		--identifier "https://github.com/edulazaro/laravel-countries-auth0" \
		--offline-access \
		--no-input \
		--json > .auth0.api.json
	```

After you have configured Auth0, start the development server:
```bash
php artisan serve
```

For a development environment, start Vite using this command:
```bash
npm run dev
```

For a production environment, build the assets with Vite using this command:
```bash
npm run build
```

**NOTE**: When running the app without docker, you will need to install **redis** or **memcached** on your machine for caching and the set them on the `.env` file.

## Running with Docker

There are 4 containers configured: one for nginx, another one for memcached, another one for node and finally the container for the app.

First, clone the `git@github.com:edulazaro/laravel-countries-auth0.git` repo. 

Inside the project directory, rename the `.env.docker.example` file as `.env.docker`:

If you want to use an existing Auth0 app, follow these steps:

1. Rename the `.auth0.api.json.example` file as `.auth0.api.json` and input the API `id`.
2. Rename the `.auth0.app.json.example` file as `.auth0.app.json` and fill the `client_id`, `client_secret` and the `signing_keys`.

If you want to use a new Auth0 app, follow these steps to generate the `.auth0.api.json` and `.auth0.app.json` files:

1. If you don't have it, download the Auth0 SDK:
	```bash
	curl -sSfL https://raw.githubusercontent.com/auth0/auth0-cli/main/install.sh | sh -s -- -b .
	```

2. Then login to Auth0:
  ```bash
  ./auth0 login
  ```

3. Create an Auth0 app:
	```bash
	./auth0 apps create \
		--name "Countries App" \
		--type "regular" \
		--auth-method "post" \
		--callbacks "http://localhost:8000/callback, http://localhost:7000/callback" \
		--logout-urls "http://localhost:8000, http://localhost:7000" \
		--reveal-secrets \
		--no-input \
		--json > .auth0.app.json
	```

4. Create an Auth0 API:
	```bash
	./auth0 apis create \
		--name "Countries App API" \
		--identifier "https://github.com/edulazaro/laravel-countries-auth0" \
		--offline-access \
		--no-input \
		--json > .auth0.api.json
	```

After you have configured Auth0, start docker:

```bash
docker-compose up
```

## Troubleshooting

**An error on the login route says that there's a callback URL mismatch**: Make sure that the the URL you are using as callback URL is configured on the Auth0 dashboard.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
