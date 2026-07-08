<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Kategori Sampah
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-4 gap-4">
            <form method="GET" class="flex-1">
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama kategori..."
                       class="border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 w-full
                              bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500
                              focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </form>
            <a href="{{ route('kategori-sampah.create') }}"
               class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg font-medium whitespace-nowrap transition">
                + Tambah
            </a>
        </div>

        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-600 text-white px-4 py-3 rounded-lg mb-4 shadow">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-900 text-left">
                        <th class="p-4 text-gray-500 dark:text-gray-400 font-semibold text-xs uppercase tracking-wider">Nama</th>
                        <th class="p-4 text-gray-500 dark:text-gray-400 font-semibold text-xs uppercase tracking-wider">Deskripsi</th>
                        <th class="p-4 text-gray-500 dark:text-gray-400 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoriSampah as $item)
                    <tr class="border-t border-gray-700 hover:bg-gray-700/50 transition">
                        <td class="p-4 text-gray-900 dark:text-gray-100 font-medium">{{ $item->nama }}</td>
                        <td class="p-4 text-gray-500 dark:text-gray-400">{{ $item->deskripsi }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('kategori-sampah.edit', $item) }}"
                               class="inline-block bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
                                Edit
                            </a>
                            <form action="{{ route('kategori-sampah.destroy', $item) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus kategori ini?');">
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
                        <td colspan="3" class="p-8 text-center text-gray-400 dark:text-gray-500">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-gray-600 dark:text-gray-400">
            {{ $kategoriSampah->links() }}
        </div>

    </div>
</x-app-layout>
