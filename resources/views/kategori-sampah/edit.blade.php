<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Edit Kategori Sampah
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 shadow rounded-lg p-6">

            <form action="{{ route('kategori-sampah.update', $kategoriSampah) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Nama Kategori</label>
                    <input type="text" name="nama" value="{{ old('nama', $kategoriSampah->nama) }}"
                           class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                  bg-gray-900 text-gray-100
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('nama')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3"
                              class="border border-gray-700 rounded-lg px-3 py-2 w-full
                                     bg-gray-900 text-gray-100
                                     focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('deskripsi', $kategoriSampah->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg font-medium transition">
                        Update
                    </button>
                    <a href="{{ route('kategori-sampah.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-gray-100 px-4 py-2 rounded-lg font-medium transition">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
