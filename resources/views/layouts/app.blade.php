<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Groups For Learning') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ URL::asset('assets/favicon.ico') }}" type="image/x-icon"/>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1RR9BV1E7T"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-1RR9BV1E7T');
        </script>
        <livewire:styles />
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-100">
            @include('layouts.navigation')

            <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<livewire:scripts />
