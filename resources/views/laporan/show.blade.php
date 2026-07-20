<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#F4F4EC] leading-tight" style="font-family: 'Fraunces', serif;">
            Detail Laporan
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">

        <a href="{{ route('laporan.index') }}"
           class="inline-flex items-center gap-2 text-[#9CB5A8] hover:text-[#F4F4EC] transition mb-4 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke daftar laporan
        </a>

        <div class="bg-[#10241C] rounded-lg overflow-hidden shadow-xl border border-[#1C3A2C]">

            @if($laporan->foto)
                <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto laporan"
                     class="w-full h-64 object-cover">
            @else
                <div class="w-full h-40 flex items-center justify-center bg-[#0C1D16] text-[#6B8577]">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                </div>
            @endif

            <div class="p-6">
                <div class="flex justify-between items-start gap-4 mb-4">
                    <h3 class="text-2xl font-semibold text-[#F4F4EC]" style="font-family: 'Fraunces', serif;">
                        {{ $laporan->judul }}
                    </h3>
                    <span class="px-3 py-1 rounded-full text-xs font-medium whitespace-nowrap
                        @if($laporan->status === 'Menunggu') bg-yellow-600 text-white
                        @elseif($laporan->status === 'Diproses') bg-blue-600 text-white
                        @else bg-[#4C9A5B] text-white
                        @endif">
                        {{ $laporan->status }}
                    </span>
                </div>

                <p class="text-[#9CB5A8] leading-relaxed mb-6">
                    {{ $laporan->deskripsi }}
                </p>

                <div class="grid grid-cols-2 gap-4 border-t border-[#1C3A2C] pt-4">
                    <div>
                        <p class="text-[#6B8577] text-xs uppercase tracking-wider mb-1">Pelapor</p>
                        <p class="text-[#F4F4EC]">{{ $laporan->user->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[#6B8577] text-xs uppercase tracking-wider mb-1">Kategori</p>
                        <p class="text-[#F4F4EC]">{{ $laporan->kategori->nama ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[#6B8577] text-xs uppercase tracking-wider mb-1">Lokasi</p>
                        <p class="text-[#F4F4EC]">{{ $laporan->lokasi }}</p>
                    </div>
                    <div>
                        <p class="text-[#6B8577] text-xs uppercase tracking-wider mb-1">Dilaporkan Pada</p>
                        <p class="text-[#F4F4EC]">{{ $laporan->created_at->translatedFormat('d M Y, H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-[#6B8577] text-xs uppercase tracking-wider mb-1">Estimasi Pengangkutan</p>
                        @if($laporan->jadwal)
                            <p class="text-[#F4F4EC]">{{ $laporan->jadwal->estimasiBerikutnya()->translatedFormat('l, d M Y') }}</p>
                        @else
                            <p class="text-[#6B8577] italic">Belum dijadwalkan</p>
                        @endif
                    </div>
                    @if($laporan->isAssigned() && $laporan->assignedBy)
                        <div>
                            <p class="text-[#6B8577] text-xs uppercase tracking-wider mb-1">Dijadwalkan oleh</p>
                            <p class="text-[#F4F4EC]">{{ $laporan->assignedBy->name }} &middot; {{ $laporan->assigned_at->translatedFormat('d M Y, H:i') }}</p>
                        </div>
                    @endif
                </div>

                <div class="flex gap-2 mt-6 pt-4 border-t border-[#1C3A2C]">
                    <a href="{{ route('laporan.edit', $laporan) }}"
                       class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-md text-sm font-medium transition">
                        Edit Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
