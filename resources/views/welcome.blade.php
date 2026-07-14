<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bersihin - Lapor Sampah, Kota Lebih Bersih</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">

    {{-- NAVBAR --}}
    <nav class="flex items-center justify-between px-6 md:px-12 py-5 bg-[#0f2419]">
        <div class="flex items-center gap-2">
            {{-- Icon tas/logo sederhana pakai SVG --}}
            <svg class="w-7 h-7 text-[#5fbf7a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3h6l1 4H8l1-4zM5 7h14l-1.5 13.5a1 1 0 01-1 .9H7.5a1 1 0 01-1-.9L5 7z"/>
            </svg>
            <span class="text-white font-serif font-bold text-xl">Bersihin</span>
        </div>

        <div class="flex items-center gap-4">
            @guest
                <a href="{{ route('login') }}"
                   class="text-white/80 hover:text-white transition font-medium">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   class="bg-[#5fbf7a] text-[#0f2419] font-semibold px-5 py-2 rounded-md hover:bg-[#4fae6a] transition">
                    Daftar
                </a>
            @else
                <a href="{{ route('dashboard') }}"
                   class="bg-[#5fbf7a] text-[#0f2419] font-semibold px-5 py-2 rounded-md hover:bg-[#4fae6a] transition">
                    Ke Dashboard
                </a>
            @endguest
        </div>
    </nav>

   {{-- HERO SECTION --}}
<section class="bg-[#0f2419] px-6 md:px-12 pt-16 pb-24 min-h-[80vh] flex items-center">
    <div class="max-w-2xl">
        <h1 class="font-serif font-bold text-white text-4xl md:text-6xl leading-tight">
            Satu laporan hari ini,<br>
            lingkungan lebih bersih besok.
        </h1>

        <p class="text-white/70 mt-6 text-lg leading-relaxed max-w-xl">
            Bersihin membantu warga melaporkan sampah dan petugas mengelola
            jadwal pengangkutan — semua dalam satu sistem yang rapi.
        </p>

        <div class="flex items-center gap-4 mt-8">
            @guest
                <a href="{{ route('register') }}"
                   class="bg-[#5fbf7a] text-[#0f2419] font-semibold px-6 py-3 rounded-md hover:bg-[#4fae6a] transition">
                    Mulai Lapor Sekarang
                </a>
                <a href="#cara-kerja"
                   class="text-white/80 hover:text-white transition font-medium">
                    Pelajari Cara Kerja →
                </a>
            @else
                <a href="{{ route('dashboard') }}"
                   class="bg-[#5fbf7a] text-[#0f2419] font-semibold px-6 py-3 rounded-md hover:bg-[#4fae6a] transition">
                    Ke Dashboard
                </a>
            @endguest
        </div>

        {{-- Badge kategori sampah, sama kayak di halaman login --}}
        <div class="mt-16">
            <p class="text-white/50 text-xs tracking-widest uppercase mb-3">
                Kategori yang kami kelola
            </p>
            <div class="flex h-2 rounded-full overflow-hidden w-full max-w-md">
                <div class="flex-1 bg-green-500"></div>
                <div class="flex-1 bg-blue-500"></div>
                <div class="flex-1 bg-orange-500"></div>
                <div class="flex-1 bg-purple-500"></div>
                <div class="flex-1 bg-teal-400"></div>
            </div>
            <div class="flex gap-4 mt-3 text-white/70 text-sm flex-wrap">
                <span>Organik</span>
                <span>Anorganik</span>
                <span>B3</span>
                <span>Elektronik</span>
                <span>Kaca</span>
            </div>
        </div>
    </div>
</section>

    {{-- CARA KERJA SECTION --}}
<section id="cara-kerja" class="bg-[#f7f7f2] px-6 md:px-12 py-20">
    <div class="max-w-5xl mx-auto">
        <h2 class="font-serif font-bold text-[#0f2419] text-3xl md:text-4xl text-center">
            Cara Kerja
        </h2>
        <p class="text-gray-500 text-center mt-3 max-w-lg mx-auto">
            Tiga langkah sederhana dari laporan sampai lingkungan bersih.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-14">

            {{-- Langkah 1 --}}
            <div class="text-center md:text-left">
                <div class="w-12 h-12 rounded-full bg-[#0f2419] text-[#5fbf7a] font-serif font-bold text-lg flex items-center justify-center mx-auto md:mx-0">
                    1
                </div>
                <h3 class="font-serif font-bold text-[#0f2419] text-xl mt-5">
                    Lapor
                </h3>
                <p class="text-gray-500 mt-2 leading-relaxed">
                    Warga memfoto sampah, tandai lokasi, dan kirim laporan langsung dari aplikasi.
                </p>
            </div>

            {{-- Langkah 2 --}}
            <div class="text-center md:text-left">
                <div class="w-12 h-12 rounded-full bg-[#0f2419] text-[#5fbf7a] font-serif font-bold text-lg flex items-center justify-center mx-auto md:mx-0">
                    2
                </div>
                <h3 class="font-serif font-bold text-[#0f2419] text-xl mt-5">
                    Verifikasi
                </h3>
                <p class="text-gray-500 mt-2 leading-relaxed">
                    Petugas meninjau laporan, menentukan prioritas, dan menjadwalkan pengangkutan.
                </p>
            </div>

            {{-- Langkah 3 --}}
            <div class="text-center md:text-left">
                <div class="w-12 h-12 rounded-full bg-[#0f2419] text-[#5fbf7a] font-serif font-bold text-lg flex items-center justify-center mx-auto md:mx-0">
                    3
                </div>
                <h3 class="font-serif font-bold text-[#0f2419] text-xl mt-5">
                    Angkut
                </h3>
                <p class="text-gray-500 mt-2 leading-relaxed">
                    Sampah diangkut sesuai jadwal, status laporan otomatis berubah jadi selesai.
                </p>
            </div>

        </div>
    </div>
</section>

{{-- KATEGORI SAMPAH SECTION --}}
<section class="bg-[#0f2419] px-6 md:px-12 py-20">
    <div class="max-w-5xl mx-auto">
        <h2 class="font-serif font-bold text-white text-3xl md:text-4xl text-center">
            Kategori yang Kami Kelola
        </h2>
        <p class="text-white/60 text-center mt-3 max-w-lg mx-auto">
            Setiap laporan otomatis dikelompokkan supaya penanganannya lebih tepat sasaran.
        </p>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-14">

            <div class="bg-white/5 border border-white/10 rounded-xl p-5 text-center hover:bg-white/10 transition">
                <div class="w-3 h-3 rounded-full bg-green-500 mx-auto mb-3"></div>
                <p class="text-white font-medium">Organik</p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-xl p-5 text-center hover:bg-white/10 transition">
                <div class="w-3 h-3 rounded-full bg-blue-500 mx-auto mb-3"></div>
                <p class="text-white font-medium">Anorganik</p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-xl p-5 text-center hover:bg-white/10 transition">
                <div class="w-3 h-3 rounded-full bg-orange-500 mx-auto mb-3"></div>
                <p class="text-white font-medium">B3</p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-xl p-5 text-center hover:bg-white/10 transition">
                <div class="w-3 h-3 rounded-full bg-purple-500 mx-auto mb-3"></div>
                <p class="text-white font-medium">Elektronik</p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-xl p-5 text-center hover:bg-white/10 transition">
                <div class="w-3 h-3 rounded-full bg-teal-400 mx-auto mb-3"></div>
                <p class="text-white font-medium">Kaca</p>
            </div>

        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="bg-[#0a1a12] px-6 md:px-12 py-8">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-[#5fbf7a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3h6l1 4H8l1-4zM5 7h14l-1.5 13.5a1 1 0 01-1 .9H7.5a1 1 0 01-1-.9L5 7z"/>
            </svg>
            <span class="text-white/80 font-serif font-bold">Bersihin</span>
        </div>
        <p class="text-white/40 text-sm">
            &copy; {{ date('Y') }} Bersihin. Tugas Besar Pemrograman Web Berbasis Framework.
        </p>
    </div>
</footer>

</body>
</html>
