<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Kategori Sampah
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow rounded p-6">

            <form action="{{ route('kategori-sampah.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 mb-1">Nama Kategori</label>
                    <input type="text" name="nama" value="{{ old('nama') }}"
                           class="border border-gray-300 dark:border-gray-600 rounded px-3 py-2 w-full
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    @error('nama')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3"
                              class="border border-gray-300 dark:border-gray-600 rounded px-3 py-2 w-full
                                     bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                    <a href="{{ route('kategori-sampah.index') }}"
                       class="bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-100 px-4 py-2 rounded">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
