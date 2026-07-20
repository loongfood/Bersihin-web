<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Bersihin') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|fraunces:500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .bersihin-bg {
                background-color: #0A1712;
                background-image:
                    radial-gradient(circle at 15% 10%, rgba(76,154,91,0.10) 0%, transparent 40%),
                    radial-gradient(circle at 85% 25%, rgba(43,179,179,0.08) 0%, transparent 35%),
                    radial-gradient(circle at 50% 90%, rgba(76,154,91,0.06) 0%, transparent 45%),
                    radial-gradient(rgba(255,255,255,0.035) 1px, transparent 1px);
                background-size: auto, auto, auto, 22px 22px;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bersihin-bg">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white/[0.02] border-b border-white/[0.06] backdrop-blur-sm">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('scripts')
    </body>
</html>
