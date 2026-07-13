<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-6">
            <h3 class="text-lg text-gray-300 font-medium">
                Selamat datang, {{ Auth::user()->name }}
                @if(Auth::user()->hasRole('admin'))
                    <span class="text-xs bg-indigo-600 text-white px-2 py-1 rounded-full ml-2">Admin</span>
                @else
                    <span class="text-xs bg-gray-600 text-white px-2 py-1 rounded-full ml-2">Warga</span>
                @endif
            </h3>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-gray-800 rounded-lg p-5 shadow-lg">
                <p class="text-gray-400 text-sm">Total Laporan</p>
                <p class="text-3xl font-bold text-white mt-1">{{ $totalLaporan }}</p>
            </div>
            <div class="bg-gray-800 rounded-lg p-5 shadow-lg">
                <p class="text-gray-400 text-sm">Menunggu</p>
                <p class="text-3xl font-bold text-yellow-500 mt-1">{{ $laporanMenunggu }}</p>
            </div>
            <div class="bg-gray-800 rounded-lg p-5 shadow-lg">
                <p class="text-gray-400 text-sm">Diproses</p>
                <p class="text-3xl font-bold text-blue-500 mt-1">{{ $laporanDiproses }}</p>
            </div>
            <div class="bg-gray-800 rounded-lg p-5 shadow-lg">
                <p class="text-gray-400 text-sm">Selesai</p>
                <p class="text-3xl font-bold text-green-500 mt-1">{{ $laporanSelesai }}</p>
            </div>
        </div>

        @if(Auth::user()->hasRole('admin'))
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-800 rounded-lg p-5 shadow-lg">
                <p class="text-gray-400 text-sm">Total Kategori Sampah</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $totalKategori }}</p>
            </div>
            <div class="bg-gray-800 rounded-lg p-5 shadow-lg">
                <p class="text-gray-400 text-sm">Total Jadwal Pengangkutan</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $totalJadwal }}</p>
            </div>
        </div>
        @endif

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-5 border-b border-gray-700">
                <h3 class="text-white font-semibold">Laporan Terbaru</h3>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-900 text-left">
                        <th class="p-3 text-gray-400 font-semibold text-xs uppercase tracking-wider">Judul</th>
                        @if(Auth::user()->hasRole('admin'))
                        <th class="p-3 text-gray-400 font-semibold text-xs uppercase tracking-wider">Pelapor</th>
                        @endif
                        <th class="p-3 text-gray-400 font-semibold text-xs uppercase tracking-wider">Kategori</th>
                        <th class="p-3 text-gray-400 font-semibold text-xs uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporanTerbaru as $item)
                    <tr class="border-t border-gray-700">
                        <td class="p-3 text-white">{{ $item->judul }}</td>
                        @if(Auth::user()->hasRole('admin'))
                        <td class="p-3 text-gray-300">{{ $item->user->name ?? '-' }}</td>
                        @endif
                        <td class="p-3 text-gray-300">{{ $item->kategori->nama ?? '-' }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($item->status === 'Menunggu') bg-yellow-600 text-white
                                @elseif($item->status === 'Diproses') bg-blue-600 text-white
                                @else bg-green-600 text-white
                                @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-gray-500">Belum ada laporan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
