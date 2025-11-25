<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <span>Kelola Stok: {{ $consumable->name }} (Satuan: {{ $consumable->unit }})</span>
            <a href="{{ route('bhp.items', $consumable->category_id) }}" class="text-sm bg-gray-200 px-3 py-1 rounded hover:bg-gray-300 text-gray-700">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-800">Riwayat Batch Kedatangan</h3>
                
                <a href="{{ route('consumable.createBatch', $consumable->id) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-green-700 shadow flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Tambah Stok Baru
                </a>
            </div>

            <div class="bg-white shadow overflow-hidden rounded-lg border border-gray-200">
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
                            <td class="px-4 py-3 text-red-600 font-bold">{{ $d->expiry_date ?? '-' }}</td>
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