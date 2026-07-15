<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#F4F4EC] leading-tight">
            Edit Kategori Sampah
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[#10241C] shadow-lg rounded-lg p-6 border border-[#1C3A2C]">

            <form action="{{ route('kategori-sampah.update', $kategoriSampah) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Nama Kategori</label>
                    <input type="text" name="nama" value="{{ old('nama', $kategoriSampah->nama) }}"
                           class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                  bg-[#0C1D16] text-[#F4F4EC]
                                  focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">
                    @error('nama')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3"
                              class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                     bg-[#0C1D16] text-[#F4F4EC]
                                     focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">{{ old('deskripsi', $kategoriSampah->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-lg font-medium transition">
                        Update
                    </button>
                    <a href="{{ route('kategori-sampah.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-[#F4F4EC] px-4 py-2 rounded-lg font-medium transition">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
