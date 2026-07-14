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
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col lg:flex-row">

            {{-- PANEL KIRI --}}
            <div class="relative w-full lg:w-[45%] bg-[#10241C] px-8 py-10 lg:py-16 flex flex-col justify-between overflow-hidden">

                <div class="relative z-10">
                    <a href="/" class="inline-flex items-center gap-2">
                        <svg class="w-8 h-8 text-[#4C9A5B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M9 3.75V9m6-5.25V9m-6 0h6" />
                        </svg>
                        <span class="text-[#F4F4EC] font-medium tracking-wide" style="font-family: 'Fraunces', serif;">Bersihin</span>
                    </a>
                </div>

                <div class="relative z-10 max-w-sm py-12 lg:py-0">
                    <h1 class="text-3xl lg:text-4xl text-[#F4F4EC] leading-snug" style="font-family: 'Fraunces', serif; font-weight: 600;">
                        Satu laporan hari ini,<br>lingkungan lebih bersih besok.
                    </h1>
                    <p class="text-[#9CB5A8] mt-4 text-sm leading-relaxed">
                        Bersihin membantu warga melaporkan sampah dan petugas mengelola jadwal pengangkutan — semua dalam satu sistem yang rapi.
                    </p>
                </div>

                {{-- Signature element: spine kategori sampah --}}
                <div class="relative z-10 hidden lg:block">
                    <p class="text-[#9CB5A8] text-xs uppercase tracking-widest mb-3">Kategori yang kami kelola</p>
                    <div class="flex gap-1.5 h-2 rounded-full overflow-hidden mb-3">
                        <div class="flex-1 bg-[#4C9A5B]"></div>
                        <div class="flex-1 bg-[#3B82C4]"></div>
                        <div class="flex-1 bg-[#C4523B]"></div>
                        <div class="flex-1 bg-[#8B5FBF]"></div>
                        <div class="flex-1 bg-[#2BB3B3]"></div>
                    </div>
                    <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-[#9CB5A8]">
                        <span>Organik</span>
                        <span>Anorganik</span>
                        <span>B3</span>
                        <span>Elektronik</span>
                        <span>Kaca</span>
                    </div>
                </div>
            </div>

            {{-- PANEL KANAN --}}
            <div class="w-full lg:w-[55%] bg-[#FAFAF7] flex items-center justify-center px-6 py-12">
                <div class="w-full max-w-sm">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </body>
</html>
