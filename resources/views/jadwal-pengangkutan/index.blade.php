<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#F4F4EC] leading-tight" style="font-family: 'Fraunces', serif;">
            Jadwal Pengangkutan
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-4 gap-4">
            <a href="{{ route('jadwal-pengangkutan.create') }}"
               class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-lg font-medium whitespace-nowrap transition shadow-sm hover:shadow-md">
                + Tambah
            </a>
        </div>

        <form method="GET" class="flex flex-wrap gap-3 mb-4">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari area atau petugas..."
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

            <button type="submit" class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-lg font-medium transition shadow-sm hover:shadow-md">
                Filter
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
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Kategori</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Hari</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Area</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Petugas</th>
                        <th class="p-4 text-[#9CB5A8] font-semibold text-xs uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwalPengangkutan as $item)
                    <tr class="border-t border-[#1C3A2C] hover:bg-[#152C21] transition">
                        <td class="p-4 text-[#F4F4EC] font-medium">{{ $item->kategori->nama ?? '-' }}</td>
                        <td class="p-4 text-[#9CB5A8]">{{ $item->hari }}</td>
                        <td class="p-4 text-[#9CB5A8]">{{ $item->area }}</td>
                        <td class="p-4 text-[#9CB5A8]">{{ $item->petugas }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('jadwal-pengangkutan.edit', $item) }}"
                               class="inline-block bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
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
                        <td colspan="5" class="p-12 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <svg class="w-12 h-12 text-[#3F5647]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-[#9CB5A8] font-medium">Belum ada jadwal pengangkutan</p>
                                <p class="text-[#6B8577] text-sm">Atur jadwal agar petugas tahu kapan harus bertugas</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $jadwalPengangkutan->links() }}
        </div>

    </div>
</x-app-layout>
