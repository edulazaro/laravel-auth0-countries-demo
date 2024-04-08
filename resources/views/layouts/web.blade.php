<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Countries App')</title>
    <meta name="description" content="@yield('description', 'Countries App')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/web.js'])
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
        <div class="relative min-h-screen flex justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <svg class="h-12 w-auto lg:h-16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewBox="0 0 46.748 46.748" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M14.608,45.041c2.719-1.609,7.495-4.761,12.236-9.459c-0.798-1.072-1.625-2.195-2.462-3.342
                                            c-0.364,0.003-0.728,0.006-1.092,0.006c-0.012,0-0.023,0-0.035,0c-0.879,0-1.746-0.021-2.601-0.062
                                            c-0.585,1.39-1.959,2.365-3.562,2.365c-0.408,0-0.794-0.081-1.164-0.197c-2.294,3.75-4.047,6.898-5.056,8.768
                                            C12.052,43.866,13.301,44.512,14.608,45.041z" />
                                    <path d="M44.75,13.911c-0.997,1.719-2.168,3.679-3.486,5.784c2.088,0.58,3.905,1.196,5.402,1.757
                                            C46.449,18.786,45.786,16.249,44.75,13.911z" />
                                    <path d="M36.539,9.829c0.109,0.36,0.188,0.734,0.188,1.13c0,1.139-0.502,2.152-1.285,2.859c0.361,0.576,0.731,1.15,1.115,1.718
                                            c0.823,1.223,1.683,2.428,2.553,3.6c0.041,0.01,0.084,0.02,0.125,0.03c1.75-2.77,3.248-5.306,4.437-7.386
                                            c-0.942-1.649-2.082-3.171-3.386-4.537C39.188,7.945,37.915,8.807,36.539,9.829z" />
                                    <path d="M32.08,26.822c0.624,0,1.205,0.162,1.727,0.424c1.514-2.107,2.935-4.211,4.241-6.227
                                            c-0.019-0.024-0.036-0.049-0.055-0.073c-3.46-0.803-7.454-1.427-11.724-1.529c-0.609,0.726-1.211,1.476-1.797,2.256
                                            c-0.897,1.198-1.769,2.404-2.608,3.603c1.125,1.617,2.317,3.289,3.524,4.951c0.969-0.017,1.932-0.041,2.883-0.076
                                            C28.534,28.273,30.13,26.822,32.08,26.822z" />
                                    <path d="M29.143,33.167c-0.259-0.308-0.479-0.646-0.636-1.022c-0.556,0.021-1.116,0.037-1.68,0.052
                                            c0.479,0.651,0.957,1.298,1.43,1.935C28.555,33.816,28.85,33.495,29.143,33.167z" />
                                    <path d="M17.094,26.822c0.405,0,0.787,0.08,1.153,0.195c0.387-0.578,0.783-1.16,1.186-1.746c-0.31-0.449-0.621-0.901-0.915-1.338
                                            c-0.866-1.287-1.688-2.727-2.455-4.244c-6.898,0.418-12.815,1.194-15.966,1.659c-0.057,0.668-0.093,1.342-0.093,2.025
                                            c0,0.687,0.036,1.366,0.094,2.038c2.573,1.084,7.385,2.867,13.385,3.939C14.027,27.878,15.432,26.822,17.094,26.822z" />
                                    <path d="M23.692,19.41c-1.845,0.02-3.668,0.078-5.442,0.163c0.61,1.15,1.253,2.244,1.926,3.243
                                            c0.156,0.232,0.317,0.469,0.479,0.706c0.72-1.016,1.46-2.035,2.22-3.046C23.144,20.113,23.417,19.759,23.692,19.41z" />
                                    <path d="M20.907,30.189c0.668,0.031,1.345,0.049,2.026,0.053c-0.774-1.075-1.536-2.149-2.282-3.213
                                            c-0.241,0.354-0.479,0.707-0.715,1.059C20.458,28.659,20.803,29.384,20.907,30.189z" />
                                    <path d="M14.245,33.273c-0.479-0.526-0.815-1.181-0.945-1.912c-5.518-0.959-10.036-2.506-12.887-3.646
                                            c1.088,5.787,4.304,10.82,8.809,14.254C10.263,40.05,11.996,36.948,14.245,33.273z" />
                                    <path d="M15.124,17.747c-2.24-4.862-3.948-10.165-4.93-13.673c-5.082,3.478-8.715,8.911-9.827,15.215
                                            C3.536,18.832,8.901,18.153,15.124,17.747z" />
                                    <path d="M17.27,17.619c2.505-0.132,5.119-0.215,7.761-0.216c0.011,0,0.023,0,0.033,0c0.098,0,0.19,0.003,0.287,0.003
                                            c1.396-1.608,2.826-3.075,4.242-4.406c-0.371-0.593-0.595-1.289-0.595-2.04c0-1.017,0.401-1.934,1.043-2.624
                                            c-1.653-3.235-2.917-6.161-3.676-8.139C25.387,0.072,24.389,0,23.376,0c-4.144,0-8.033,1.083-11.407,2.975
                                            C12.919,6.432,14.766,12.367,17.27,17.619z" />
                                    <path d="M29.596,39.252c-0.481-0.638-1.002-1.33-1.537-2.044c-4.067,4.011-8.121,6.89-10.965,8.679
                                            c2,0.557,4.106,0.861,6.284,0.861c3.639,0,7.081-0.831,10.15-2.312C32.602,43.227,31.348,41.568,29.596,39.252z" />
                                    <path d="M35.787,31.714c-0.452,1.632-1.932,2.834-3.707,2.834c-0.449,0-0.875-0.092-1.275-0.233
                                            c-0.44,0.498-0.884,0.982-1.328,1.451c2.314,3.092,4.414,5.832,5.854,7.694c4.793-2.858,8.474-7.383,10.248-12.774
                                            C42.977,31.025,39.602,31.411,35.787,31.714z" />
                                    <path d="M27.979,17.482c2.916,0.155,5.676,0.527,8.205,1.016c-0.455-0.635-0.889-1.253-1.285-1.844
                                            c-0.426-0.631-0.836-1.271-1.238-1.916c-0.258,0.054-0.523,0.084-0.796,0.084c-0.646,0-1.247-0.174-1.782-0.455
                                            C30.046,15.332,29.005,16.372,27.979,17.482z" />
                                    <path d="M31.747,7.28c0.354-0.108,0.726-0.184,1.116-0.184c1.002,0,1.906,0.392,2.593,1.018c1.206-0.892,2.328-1.657,3.331-2.307
                                            C35.943,3.31,32.489,1.494,28.675,0.61C29.395,2.358,30.434,4.698,31.747,7.28z" />
                                    <path d="M46.744,23.641c-1.489-0.578-3.393-1.25-5.627-1.887c1.816,2.307,3.598,4.404,5.184,6.197
                                            C46.578,26.555,46.729,25.113,46.744,23.641z" />
                                    <path d="M44.384,28.823c-1.635-1.894-3.387-4.017-5.042-6.127c-1.252,1.915-2.601,3.896-4.029,5.883
                                            c0.225,0.342,0.386,0.724,0.492,1.129C39.066,29.445,41.999,29.122,44.384,28.823z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                        @endif
                        @endauth
                    </nav>
                    @endif
                </header>
                <main class="mt-6">
                    @yield('content')
                </main>
                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>
</body>

</html>