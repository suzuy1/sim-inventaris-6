<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tambah BHP: {{ $category->name }}
            </h2>
            <a href="{{ route('bhp.items', $category->id) }}" class="text-sm text-gray-500 hover:text-gray-700">
                &larr; Batal
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 border-t-4 border-green-500">
                
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Registrasi Barang Habis Pakai</h3>
                    <p class="text-sm text-gray-500">Data induk untuk barang yang stoknya akan terus dipantau (Obat, ATK, dll).</p>
                </div>

                <form action="{{ route('bhp.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">

                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <div class="col-span-2">
                            <label class="block font-medium text-sm text-gray-700 mb-2">Nama Barang</label>
                            <input type="text" name="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" placeholder="Contoh: Kertas HVS A4 80gr" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 mb-2">Satuan</label>
                            <input type="text" name="unit" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" placeholder="Rim / Box / Pcs" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700 mb-2">Keterangan</label>
                        <textarea name="notes" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"></textarea>
                    </div>

                    <div class="flex justify-end items-center gap-4">
                        <a href="{{ route('bhp.items', $category->id) }}" class="text-gray-600 hover:underline text-sm">Batal</a>
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-green-700 transition shadow-md">
                            Simpan & Input Stok Awal &rarr;
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>