<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="theme-color" content="#fff8f6">

        <title>@yield('title', config('app.name', 'AVIL Skincare'))</title>

        @hasSection('page-assets')
            @yield('page-assets')
        @else
            @vite(['resources/css/stitch/profile.css', 'resources/js/stitch/profile.js'])
        @endif
    </head>
    <body class="min-h-screen bg-surface font-body-md text-on-surface antialiased">
        @yield('content')
    </body>
</html>
