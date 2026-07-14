<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#10241C] leading-tight" style="font-family: 'Fraunces', serif;">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-6">
            <h3 class="text-lg text-[#3F5647] font-medium">
                Selamat datang, {{ Auth::user()->name }}
                @if(Auth::user()->hasRole('admin'))
                    <span class="text-xs bg-[#4C9A5B] text-white px-2 py-1 rounded-full ml-2">Admin</span>
                @else
                    <span class="text-xs bg-[#6B8577] text-white px-2 py-1 rounded-full ml-2">Warga</span>
                @endif
            </h3>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-[#10241C] rounded-lg p-5 shadow-lg border border-[#1C3A2C]">
                <p class="text-[#9CB5A8] text-sm">Total Laporan</p>
                <p class="text-3xl font-bold text-[#F4F4EC] mt-1">{{ $totalLaporan }}</p>
            </div>
            <div class="bg-[#10241C] rounded-lg p-5 shadow-lg border border-[#1C3A2C]">
                <p class="text-[#9CB5A8] text-sm">Menunggu</p>
                <p class="text-3xl font-bold text-yellow-500 mt-1">{{ $laporanMenunggu }}</p>
            </div>
            <div class="bg-[#10241C] rounded-lg p-5 shadow-lg border border-[#1C3A2C]">
                <p class="text-[#9CB5A8] text-sm">Diproses</p>
                <p class="text-3xl font-bold text-blue-400 mt-1">{{ $laporanDiproses }}</p>
            </div>
            <div class="bg-[#10241C] rounded-lg p-5 shadow-lg border border-[#1C3A2C]">
                <p class="text-[#9CB5A8] text-sm">Selesai</p>
                <p class="text-3xl font-bold text-[#4C9A5B] mt-1">{{ $laporanSelesai }}</p>
            </div>
        </div>

        @if(Auth::user()->hasRole('admin'))
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-[#10241C] rounded-lg p-5 shadow-lg border border-[#1C3A2C]">
                <p class="text-[#9CB5A8] text-sm">Total Kategori Sampah</p>
                <p class="text-2xl font-bold text-[#F4F4EC] mt-1">{{ $totalKategori }}</p>
            </div>
            <div class="bg-[#10241C] rounded-lg p-5 shadow-lg border border-[#1C3A2C]">
                <p class="text-[#9CB5A8] text-sm">Total Jadwal Pengangkutan</p>
                <p class="text-2xl font-bold text-[#F4F4EC] mt-1">{{ $totalJadwal }}</p>
            </div>
        </div>
        @endif

        <div class="bg-[#10241C] rounded-lg shadow-lg overflow-hidden border border-[#1C3A2C]">
            <div class="p-5 border-b border-[#1C3A2C]">
                <h3 class="text-[#F4F4EC] font-semibold" style="font-family: 'Fraunces', serif;">Laporan Terbaru</h3>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="bg-[#0C1D16] text-left">
                        <th class="p-3 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Judul</th>
                        @if(Auth::user()->hasRole('admin'))
                        <th class="p-3 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Pelapor</th>
                        @endif
                        <th class="p-3 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Kategori</th>
                        <th class="p-3 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporanTerbaru as $item)
                    <tr class="border-t border-[#1C3A2C] hover:bg-[#152C21] transition">
                        <td class="p-3 text-[#F4F4EC]">{{ $item->judul }}</td>
                        @if(Auth::user()->hasRole('admin'))
                        <td class="p-3 text-[#9CB5A8]">{{ $item->user->name ?? '-' }}</td>
                        @endif
                        <td class="p-3 text-[#9CB5A8]">{{ $item->kategori->nama ?? '-' }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($item->status === 'Menunggu') bg-yellow-600 text-white
                                @elseif($item->status === 'Diproses') bg-blue-600 text-white
                                @else bg-[#4C9A5B] text-white
                                @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-[#6B8577]">Belum ada laporan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
