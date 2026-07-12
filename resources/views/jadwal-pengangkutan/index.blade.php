<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Jadwal Pengangkutan
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-4 gap-4">
            <a href="{{ route('jadwal-pengangkutan.create') }}"
               class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg font-medium whitespace-nowrap transition">
                + Tambah
            </a>
        </div>

        <form method="GET" class="flex gap-3 mb-4">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari area atau petugas..."
                   class="border border-gray-700 rounded-lg px-4 py-2 flex-1
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
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Kategori</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Hari</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Area</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Petugas</th>
                        <th class="p-4 text-gray-400 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwalPengangkutan as $item)
                    <tr class="border-t border-gray-700 hover:bg-gray-700/50 transition">
                        <td class="p-4 text-white font-medium">{{ $item->kategori->nama ?? '-' }}</td>
                        <td class="p-4 text-gray-300">{{ $item->hari }}</td>
                        <td class="p-4 text-gray-300">{{ $item->area }}</td>
                        <td class="p-4 text-gray-300">{{ $item->petugas }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('jadwal-pengangkutan.edit', $item) }}"
                               class="inline-block bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
                                Edit
                            </a>
                            <form action="{{ route('jadwal-pengangkutan.destroy', $item) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus jadwal ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-500">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-gray-400">
            {{ $jadwalPengangkutan->links() }}
        </div>

    </div>
</x-app-layout>
