<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#F4F4EC] leading-tight">
            Edit Laporan
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[#10241C] shadow-lg rounded-lg p-6 border border-[#1C3A2C]">

            @if($laporan->foto)
                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Foto Saat Ini</label>
                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto laporan"
                         class="w-full max-w-xs rounded-lg border border-[#1C3A2C]">
                </div>
            @endif

            <form action="{{ route('laporan.update', $laporan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Kategori Sampah</label>
                    <select name="kategori_id"
                            class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                   bg-[#0C1D16] text-[#F4F4EC]
                                   focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoriList as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ old('kategori_id', $laporan->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Judul Laporan</label>
                    <input type="text" name="judul" value="{{ old('judul', $laporan->judul) }}"
                           class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                  bg-[#0C1D16] text-[#F4F4EC]
                                  focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">
                    @error('judul')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3"
                              class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                     bg-[#0C1D16] text-[#F4F4EC]
                                     focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $laporan->lokasi) }}"
                           class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                  bg-[#0C1D16] text-[#F4F4EC]
                                  focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">
                    @error('lokasi')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Ganti Foto (opsional)</label>
                    <input type="file" name="foto" accept="image/*"
                           class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                  bg-[#0C1D16] text-[#F4F4EC]
                                  file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0
                                  file:bg-[#4C9A5B] file:text-white file:cursor-pointer">
                    <p class="text-gray-500 text-xs mt-1">Kosongkan jika tidak ingin mengganti foto</p>
                    @error('foto')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @if(Auth::user()->hasRole('admin'))
                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Status</label>
                    <select name="status"
                            class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                   bg-[#0C1D16] text-[#F4F4EC]
                                   focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">
                        @foreach(['Menunggu', 'Diproses', 'Selesai'] as $s)
                            <option value="{{ $s }}" {{ old('status', $laporan->status) === $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                @endif

                <div class="flex gap-2">
                    <button type="submit" class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-lg font-medium transition">
                        Update
                    </button>
                    <a href="{{ route('laporan.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-[#F4F4EC] px-4 py-2 rounded-lg font-medium transition">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
