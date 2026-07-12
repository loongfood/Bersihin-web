<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Tambah Jadwal Pengangkutan
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 shadow rounded-lg p-6">

            <form action="{{ route('jadwal-pengangkutan.store') }}" method="POST">
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
                    <label class="block text-gray-300 mb-1">Hari</label>
                    <select name="hari"
                            class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                   bg-gray-900 text-gray-100
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Pilih Hari --</option>
                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                            <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                        @endforeach
                    </select>
                    @error('hari')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Area</label>
                    <input type="text" name="area" value="{{ old('area') }}" placeholder="Contoh: Perumahan Blok A"
                           class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                  bg-gray-900 text-gray-100
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('area')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Petugas</label>
                    <input type="text" name="petugas" value="{{ old('petugas') }}" placeholder="Nama petugas"
                           class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                  bg-gray-900 text-gray-100
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('petugas')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg font-medium transition">
                        Simpan
                    </button>
                    <a href="{{ route('jadwal-pengangkutan.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-gray-100 px-4 py-2 rounded-lg font-medium transition">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
