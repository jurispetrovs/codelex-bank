<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            <a href="{{ url('/') }}">Codelex Bank</a>
                        </h2>
                        <div>
                            @if (Route::has('login'))
                                <div >
                                    @auth
                                        <a href="{{ url('/overview') }}" class="text-sm text-gray-700 underline">Personal Area</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Become a customer</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </header>

            <main>
                <div class="py-12">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
