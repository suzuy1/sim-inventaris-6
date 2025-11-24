<x-app-layout>
    <x-slot name="header">Kelola Stok: {{ $consumable->name }} (Satuan: {{ $consumable->unit }})</x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white p-6 rounded shadow mb-6 border-t-4 border-green-500">
                <h4 class="font-bold mb-4">Input Stok Masuk (Batch Baru)</h4>
                <form action="{{ route('consumable.storeDetail') }}" method="POST" class="grid grid-cols-4 gap-4">
                    @csrf
                    <input type="hidden" name="consumable_id" value="{{ $consumable->id }}">
                    
                    <div>
                        <label class="font-bold text-xs">Merk / Tipe</label>
                        <input type="text" name="model_name" class="w-full border-gray-300 rounded text-sm" required>
                    </div>
                    <div>
                        <label class="font-bold text-xs">Jumlah Masuk</label>
                        <input type="number" name="initial_stock" class="w-full border-gray-300 rounded text-sm" required>
                    </div>
                    <div>
                        <label class="font-bold text-xs">Tgl Kadaluarsa</label>
                        <input type="date" name="expiry_date" class="w-full border-gray-300 rounded text-sm">
                    </div>
                    <div>
                       <label class="font-bold text-xs">Sumber Dana</label>
    <select name="funding_source_id" class="w-full border-gray-300 rounded text-sm bg-yellow-50 focus:ring-blue-500" required>
        <option value="">-- Pilih Sumber --</option>
        @foreach($fundings as $f)
            <option value="{{ $f->id }}">{{ $f->name }}</option>
        @endforeach
    </select>
                    </div>

                    <div>
                        <label class="font-bold text-xs">Lokasi Simpan</label>
                        <select name="room_id" class="w-full border-gray-300 rounded text-sm" required>
                            @foreach($rooms as $r)
                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="font-bold text-xs">Tgl Pengecekan</label>
                        <input type="date" name="check_date" class="w-full border-gray-300 rounded text-sm">
                    </div>
                    <div class="col-span-2">
                        <label class="font-bold text-xs">Keterangan</label>
                        <input type="text" name="notes" class="w-full border-gray-300 rounded text-sm">
                    </div>

                    <div class="col-span-4 flex justify-end">
                        <button class="bg-green-600 text-white px-6 py-2 rounded font-bold">+ Tambah Stok</button>
                    </div>
                </form>
            </div>

            <div class="bg-white shadow overflow-hidden rounded">
                <table class="w-full text-xs text-left text-gray-600">
                    <thead class="bg-gray-100 uppercase font-bold text-gray-700">
                        <tr>
                            <th class="px-4 py-3">Kode Batch</th>
                            <th class="px-4 py-3">Merk</th>
                            <th class="px-4 py-3">Stok Awal</th>
                            <th class="px-4 py-3 text-green-700">Sisa Stok</th>
                            <th class="px-4 py-3 text-red-600">Kadaluarsa</th>
                            <th class="px-4 py-3">Lokasi</th>
                            <th class="px-4 py-3">Sumber Dana</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $d)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-bold text-blue-600">{{ $d->batch_code }}</td>
                            <td class="px-4 py-3">{{ $d->model_name }}</td>
                            <td class="px-4 py-3">{{ $d->initial_stock }}</td>
                            <td class="px-4 py-3 font-bold text-green-700 text-sm">{{ $d->current_stock }}</td>
                            <td class="px-4 py-3 text-red-600">{{ $d->expiry_date ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $d->room->name }}</td>
                            <td class="px-4 py-3">{{ $d->fundingSource->name }}</td>
                            <td class="px-4 py-3">
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>