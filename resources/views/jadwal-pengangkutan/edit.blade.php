<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#F4F4EC] leading-tight">
            Edit Jadwal Pengangkutan
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[#10241C] shadow-lg rounded-lg p-6 border border-[#1C3A2C]">

            <form action="{{ route('jadwal-pengangkutan.update', $jadwalPengangkutan) }}" method="POST">
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
                                {{ old('kategori_id', $jadwalPengangkutan->kategori_id) == $kategori->id ? 'selected' : '' }}>
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
                            class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                   bg-[#0C1D16] text-[#F4F4EC]
                                   focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">
                        <option value="">-- Pilih Hari --</option>
                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                            <option value="{{ $hari }}"
                                {{ old('hari', $jadwalPengangkutan->hari) == $hari ? 'selected' : '' }}>
                                {{ $hari }}
                            </option>
                        @endforeach
                    </select>
                    @error('hari')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Area</label>
                    <input type="text" name="area" value="{{ old('area', $jadwalPengangkutan->area) }}"
                           class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                  bg-[#0C1D16] text-[#F4F4EC]
                                  focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">
                    @error('area')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Petugas</label>
                    <input type="text" name="petugas" value="{{ old('petugas', $jadwalPengangkutan->petugas) }}"
                           class="border border-[#1C3A2C] rounded-lg px-3 py-2 w-full
                                  bg-[#0C1D16] text-[#F4F4EC]
                                  focus:outline-none focus:ring-2 focus:ring-[#4C9A5B]">
                    @error('petugas')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-[#4C9A5B] hover:bg-[#3f8049] text-white px-4 py-2 rounded-lg font-medium transition">
                        Update
                    </button>
                    <a href="{{ route('jadwal-pengangkutan.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-[#F4F4EC] px-4 py-2 rounded-lg font-medium transition">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
