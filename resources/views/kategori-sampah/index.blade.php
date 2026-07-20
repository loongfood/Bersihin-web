<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#F4F4EC] leading-tight" style="font-family: 'Fraunces', serif;">
            Kategori Sampah
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-4 gap-4">
            <a href="{{ route('kategori-sampah.create') }}"
               class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-lg font-medium whitespace-nowrap transition shadow-sm hover:shadow-md">
                + Tambah
            </a>
        </div>

        <form method="GET" class="flex gap-3 mb-4">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama kategori..."
                   class="border border-[#1C3A2C] rounded-lg px-4 py-2 flex-1
                          bg-[#0C1D16] text-[#F4F4EC] placeholder-[#6B8577]
                          focus:outline-none focus:ring-2 focus:ring-[#4C9A5B] focus:border-[#4C9A5B]">

            <button type="submit" class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-lg font-medium transition shadow-sm hover:shadow-md">
                Cari
            </button>
        </form>

        @if(session('success'))
            <div x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 5000)"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-4"
                class="flex items-center gap-3 bg-[#4C9A5B] text-white px-4 py-3 rounded-lg mb-4 shadow-lg">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
                <button @click="show = false" class="ml-auto text-white/70 hover:text-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif

        <div class="bg-[#10241C] rounded-lg overflow-hidden shadow-xl border border-[#1C3A2C]">
            <table class="w-full">
                <thead>
                    <tr class="bg-[#0C1D16] text-left">
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Nama</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Deskripsi</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoriSampah as $item)
                    <tr class="border-t border-[#1C3A2C] hover:bg-[#152C21] transition">
                        <td class="p-4 text-[#F4F4EC] font-medium">{{ $item->nama }}</td>
                        <td class="p-4 text-[#9CB5A8]">{{ $item->deskripsi }}</td>
                        <td class="p-4">
                            <div class="flex gap-2">
                                <a href="{{ route('kategori-sampah.edit', $item) }}"
                                class="flex items-center justify-center w-20 bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
                                    Edit
                                </a>
                                <form action="{{ route('kategori-sampah.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="flex items-center justify-center w-20 bg-red-600 hover:bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-12 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <svg class="w-12 h-12 text-[#3F5647]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                <p class="text-[#9CB5A8] font-medium">Belum ada kategori sampah</p>
                                <p class="text-[#6B8577] text-sm">Tambahkan kategori untuk mulai mengelompokkan laporan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $kategoriSampah->links() }}
        </div>

    </div>
</x-app-layout>
