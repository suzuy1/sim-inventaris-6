<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tambah Aset: {{ $category->name }}
            </h2>
            <a href="{{ route('inventaris.items', $category->id) }}" class="text-sm text-gray-500 hover:text-gray-700">
                &larr; Batal
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Barang Induk</h3>
                    <p class="text-sm text-gray-500">Data ini adalah referensi utama (misal: "Laptop Asus ROG"). Detail unit fisik akan diinput setelah ini.</p>
                </div>

                <form action="{{ route('inventaris.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">

                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700 mb-2">Nama Barang / Aset</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Proyektor Epson EB-X500" required autofocus>
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700 mb-2">Deskripsi / Spesifikasi Singkat</label>
                        <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Resolusi XGA, 3600 Lumens, HDMI Support"></textarea>
                    </div>

                    <div class="flex justify-end items-center gap-4">
                        <a href="{{ route('inventaris.items', $category->id) }}" class="text-gray-600 hover:underline text-sm">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition shadow-md">
                            Simpan & Lanjut ke Unit &rarr;
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>