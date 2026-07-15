<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#F4F4EC] leading-tight" style="font-family: 'Fraunces', serif;">
            Laporan Sampah
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-4 gap-4">
            <a href="{{ route('laporan.create') }}"
               class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-lg font-medium whitespace-nowrap transition shadow-sm hover:shadow-md">
                + Buat Laporan
            </a>
        </div>

        <form method="GET" class="flex flex-wrap gap-3 mb-4">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari judul atau lokasi..."
                   class="border border-[#1C3A2C] rounded-lg px-4 py-2 flex-1 min-w-[200px]
                          bg-[#0C1D16] text-[#F4F4EC] placeholder-[#6B8577]
                          focus:outline-none focus:ring-2 focus:ring-[#4C9A5B] focus:border-[#4C9A5B]">

            <select name="kategori_id"
                    class="border border-[#1C3A2C] rounded-lg px-4 py-2
                           bg-[#0C1D16] text-[#F4F4EC]
                           focus:outline-none focus:ring-2 focus:ring-[#4C9A5B] focus:border-[#4C9A5B]">
                <option value="">Semua Kategori</option>
                @foreach($kategoriList as $kategori)
                    <option value="{{ $kategori->id }}" {{ (string)$kategoriId === (string)$kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>

            <select name="status"
                    class="border border-[#1C3A2C] rounded-lg px-4 py-2
                           bg-[#0C1D16] text-[#F4F4EC]
                           focus:outline-none focus:ring-2 focus:ring-[#4C9A5B] focus:border-[#4C9A5B]">
                <option value="">Semua Status</option>
                @foreach(['Menunggu', 'Diproses', 'Selesai'] as $s)
                    <option value="{{ $s }}" {{ $status === $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>

            <button type="submit" class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-lg font-medium transition shadow-sm hover:shadow-md">
                Filter
            </button>
        </form>

        @if(session('success'))
            <div x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)"
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
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Foto</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Judul</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Pelapor</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Kategori</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Lokasi</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Status</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporan as $item)
                    <tr class="border-t border-[#1C3A2C] hover:bg-[#152C21] transition">
                        <td class="p-4">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto laporan"
                                    class="w-12 h-12 object-cover rounded-lg border border-[#1C3A2C]">
                            @else
                                <div class="w-12 h-12 flex items-center justify-center bg-[#0C1D16] rounded-lg border border-[#1C3A2C] text-[#6B8577]">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="p-4 text-[#F4F4EC] font-medium">{{ $item->judul }}</td>
                        <td class="p-4 text-[#9CB5A8]">{{ $item->user->name ?? '-' }}</td>
                        <td class="p-4 text-[#9CB5A8]">{{ $item->kategori->nama ?? '-' }}</td>
                        <td class="p-4 text-[#9CB5A8]">{{ $item->lokasi }}</td>
                        <td class="p-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($item->status === 'Menunggu') bg-yellow-600 text-white
                                @elseif($item->status === 'Diproses') bg-blue-600 text-white
                                @else bg-[#4C9A5B] text-white
                                @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex gap-2">
                                <a href="{{ route('laporan.edit', $item) }}"
                                   class="flex items-center justify-center w-16 bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
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
                        <td colspan="7" class="p-12 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <svg class="w-12 h-12 text-[#3F5647]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-[#9CB5A8] font-medium">Belum ada laporan masuk</p>
                                <p class="text-[#6B8577] text-sm">Laporan yang dibuat warga akan muncul di sini</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-[#9CB5A8]">
            {{ $laporan->links() }}
        </div>

    </div>
</x-app-layout>
