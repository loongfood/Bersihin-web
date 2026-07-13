<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Laporan Sampah
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-4 gap-4">
            <a href="{{ route('laporan.create') }}"
               class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg font-medium whitespace-nowrap transition">
                + Buat Laporan
            </a>
        </div>

        <form method="GET" class="flex flex-wrap gap-3 mb-4">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari judul atau lokasi..."
                   class="border border-gray-700 rounded-lg px-4 py-2 flex-1 min-w-[200px]
                          bg-gray-900 text-gray-100 placeholder-gray-500
                          focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <select name="kategori_id"
                    class="border border-gray-700 rounded-lg px-4 py-2
                           bg-gray-900 text-gray-100
                           focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Semua Kategori</option>
                @foreach($kategoriList as $kategori)
                    <option value="{{ $kategori->id }}" {{ (string)$kategoriId === (string)$kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>

            <select name="status"
                    class="border border-gray-700 rounded-lg px-4 py-2
                           bg-gray-900 text-gray-100
                           focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Semua Status</option>
                @foreach(['Menunggu', 'Diproses', 'Selesai'] as $s)
                    <option value="{{ $s }}" {{ $status === $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>

            <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition">
                Filter
            </button>
        </form>

        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-600 text-white px-4 py-3 rounded-lg mb-4 shadow-lg">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-gray-800 rounded-lg overflow-hidden shadow-xl">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-900 text-left">
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Foto</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Judul</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Pelapor</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Kategori</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Lokasi</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Status</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporan as $item)
                    <tr class="border-t border-gray-700 hover:bg-gray-700/50 transition">
                        <td class="p-4">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto laporan"
                                    class="w-12 h-12 object-cover rounded-lg border border-gray-600">
                            @else
                                <div class="w-12 h-12 flex items-center justify-center bg-gray-700 rounded-lg text-gray-500 text-xs">
                                    No foto
                                </div>
                            @endif
                        </td>
                        <td class="p-4 text-white font-medium">{{ $item->judul }}</td>
                        <td class="p-4 text-gray-300">{{ $item->user->name ?? '-' }}</td>
                        <td class="p-4 text-gray-300">{{ $item->kategori->nama ?? '-' }}</td>
                        <td class="p-4 text-gray-300">{{ $item->lokasi }}</td>
                        <td class="p-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($item->status === 'Menunggu') bg-yellow-600 text-white
                                @elseif($item->status === 'Diproses') bg-blue-600 text-white
                                @else bg-green-600 text-white
                                @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex gap-2">
                                <a href="{{ route('laporan.edit', $item) }}"
                                   class="flex items-center justify-center w-16 bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
                                    Edit
                                </a>
                                <form action="{{ route('laporan.destroy', $item) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus laporan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="flex items-center justify-center w-16 bg-red-600 hover:bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center text-gray-500">Belum ada laporan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-gray-400">
            {{ $laporan->links() }}
        </div>

    </div>
</x-app-layout>
