<x-app-layout>
    <x-slot name="header">Catat Pengambilan Barang (FIFO)</x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow border-t-4 border-red-600">
                
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <strong class="font-bold">Terjadi Kesalahan!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Pilih Barang (BHP)</label>
                        
                        <select name="consumable_id" class="w-full border-gray-300 rounded focus:ring-red-500" required>
                            <option value="">-- Cari Nama Barang --</option>
                            @foreach($consumables as $item)
                                @php $totalStock = $item->details->sum('current_stock'); @endphp
                                
                                @if($totalStock > 0)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }} (Total Stok: {{ $totalStock }} {{ $item->unit }})
                                </option>
                                @endif
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Sistem otomatis mengambil stok dari batch terlama (FIFO).</p>
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
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded font-bold hover:bg-red-700">
                            Simpan Transaksi Keluar
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>