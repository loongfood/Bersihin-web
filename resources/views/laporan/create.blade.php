<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Buat Laporan
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 shadow rounded-lg p-6">

            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Kategori Sampah</label>
                    <select name="kategori_id"
                            class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                   bg-gray-900 text-gray-100
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoriList as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
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
                    <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Tumpukan sampah di pinggir jalan"
                           class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                  bg-gray-900 text-gray-100
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('judul')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" placeholder="Jelaskan kondisi sampah secara detail"
                              class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                     bg-gray-900 text-gray-100
                                     focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Jl. Merdeka No. 10"
                           class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                  bg-gray-900 text-gray-100
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('lokasi')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Foto (opsional)</label>
                    <input type="file" name="foto" accept="image/*"
                           class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                  bg-gray-900 text-gray-100
                                  file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0
                                  file:bg-indigo-600 file:text-white file:cursor-pointer">
                    <p class="text-gray-500 text-xs mt-1">Format JPG/PNG, maksimal 2MB</p>
                    @error('foto')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg font-medium transition">
                        Kirim Laporan
                    </button>
                    <a href="{{ route('laporan.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-gray-100 px-4 py-2 rounded-lg font-medium transition">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
