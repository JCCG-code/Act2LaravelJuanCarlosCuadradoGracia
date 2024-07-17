<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Books App</title>
        {{-- Common styles --}}
        @vite(['resources/css/reset.css', 'resources/css/app.css'])
        {{-- Specific styles --}}
        @yield('styles')
    </head>
    <body>
        @include('components.header')
        <main>
            @yield('content')
        </main>
        @include('components.footer')

        {{-- Common scripts --}}
        @vite('resources/js/app.js')
        {{-- Specific scripts --}}
        @yield('scripts')
    </body>
</html>
