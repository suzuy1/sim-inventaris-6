<x-app-layout>
    <x-slot name="header">Catat Pengambilan Barang (Barang Keluar)</x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow border-t-4 border-red-600">
                
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Pilih Batch Barang</label>
                        <select name="consumable_detail_id" class="w-full border-gray-300 rounded focus:ring-red-500" required>
                            <option value="">-- Pilih Barang & Batch --</option>
                            @foreach($consumables as $item)
                                <optgroup label="{{ $item->name }} (Total: {{ $item->details->sum('current_stock') }} {{ $item->unit }})">
                                    @foreach($item->details as $batch)
                                        @if($batch->current_stock > 0)
                                        <option value="{{ $batch->id }}">
                                            Kode: {{ $batch->batch_code }} | Sisa: {{ $batch->current_stock }} | Exp: {{ $batch->expiry_date ?? '-' }}
                                        </option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1">*Hanya batch dengan stok > 0 yang tampil.</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-bold text-sm mb-2">Jumlah Keluar</label>
                            <input type="number" name="amount" min="1" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div>
                            <label class="block font-bold text-sm mb-2">Tanggal</label>
                            <input type="date" name="date" class="w-full border-gray-300 rounded" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold text-sm mb-2">Keterangan / Keperluan</label>
                        <textarea name="notes" rows="3" class="w-full border-gray-300 rounded" placeholder="Contoh: Permintaan ATK untuk acara Seminar" required></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button class="bg-red-600 text-white px-6 py-2 rounded font-bold hover:bg-red-700">
                            Simpan Transaksi Keluar
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>