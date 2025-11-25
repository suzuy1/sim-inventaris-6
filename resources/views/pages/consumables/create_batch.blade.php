<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Input Stok Masuk: {{ $consumable->name }}
            </h2>
            <a href="{{ route('consumable.detail', $consumable->id) }}" class="text-sm text-gray-500 hover:text-gray-700">
                &larr; Batal
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6 bg-blue-50 border border-blue-200 p-4 rounded-lg flex justify-between items-center">
                <div>
                    <span class="text-xs font-bold text-blue-600 uppercase">Barang</span>
                    <div class="font-bold text-gray-800">{{ $consumable->name }}</div>
                </div>
                <div>
                    <span class="text-xs font-bold text-blue-600 uppercase">Satuan</span>
                    <div class="font-bold text-gray-800">{{ $consumable->unit }}</div>
                </div>
                <div>
                    <span class="text-xs font-bold text-blue-600 uppercase">Total Stok Saat Ini</span>
                    <div class="font-bold text-gray-800">{{ $consumable->details->sum('current_stock') }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 border-t-4 border-green-500">
                <h3 class="text-lg font-medium text-gray-900 mb-6">Registrasi Batch Kedatangan</h3>

                <form action="{{ route('consumable.storeDetail') }}" method="POST">
                    @csrf
                    <input type="hidden" name="consumable_id" value="{{ $consumable->id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700 mb-1">Merk / Tipe / Vendor</label>
                                <input type="text" name="model_name" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Contoh: Sanbe / Sidu" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700 mb-1">Jumlah Masuk ({{ $consumable->unit }})</label>
                                <input type="number" name="initial_stock" class="w-full border-gray-300 rounded-lg shadow-sm font-bold text-green-600" placeholder="0" min="1" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700 mb-1">Tanggal Kadaluarsa (Exp)</label>
                                <input type="date" name="expiry_date" class="w-full border-gray-300 rounded-lg shadow-sm text-red-600">
                                <p class="text-xs text-gray-400 mt-1">*Kosongkan jika tidak ada expired (misal ATK)</p>
                            </div>
                        </div>

                        <div>
                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700 mb-1">Sumber Dana</label>
                                <select name="funding_source_id" class="w-full border-gray-300 rounded-lg shadow-sm bg-gray-50" required>
                                    <option value="">-- Pilih Sumber --</option>
                                    @foreach($fundings as $f)
                                        <option value="{{ $f->id }}">{{ $f->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700 mb-1">Lokasi Penyimpanan</label>
                                <select name="room_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                                    <option value="">-- Pilih Ruangan --</option>
                                    @foreach($rooms as $r)
                                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700 mb-1">Keterangan</label>
                                <input type="text" name="notes" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Opsional">
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-end items-center gap-4 mt-6 pt-6 border-t">
                        <a href="{{ route('consumable.detail', $consumable->id) }}" class="text-gray-600 hover:underline text-sm">Batal</a>
                        <button type="submit" class="bg-green-600 text-white px-6 py-2.5 rounded-lg font-bold hover:bg-green-700 transition shadow-md">
                            + Simpan Stok Masuk
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>