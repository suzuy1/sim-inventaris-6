<x-app-layout>
    <x-slot name="header">Daftar {{ $category->name }}</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white p-6 rounded mb-6 shadow">
                <form action="{{ route('bhp.store') }}" method="POST" class="flex gap-4 items-end">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    <div class="flex-1">
                        <label class="font-bold text-xs">Nama Barang</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded" required>
                    </div>
                    <div class="w-32">
                        <label class="font-bold text-xs">Satuan</label>
                        <input type="text" name="unit" placeholder="Box/Pcs" class="w-full border-gray-300 rounded" required>
                    </div>
                    <div class="flex-1">
                        <label class="font-bold text-xs">Keterangan</label>
                        <input type="text" name="notes" class="w-full border-gray-300 rounded">
                    </div>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded font-bold">+ Simpan</button>
                </form>
            </div>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                        <tr>
                            <th class="px-6 py-3">Nama Barang</th>
                            <th class="px-6 py-3">Total Stok</th>
                            <th class="px-6 py-3">Satuan</th>
                            <th class="px-6 py-3 text-red-600">Exp. Tercepat</th>
                            <th class="px-6 py-3">Tgl Pengecekan</th>
                            <th class="px-6 py-3">Keterangan</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-bold">{{ $item->name }}</td>
                            <td class="px-6 py-4 font-bold text-blue-600 text-lg">{{ $item->total_stock }}</td>
                            <td class="px-6 py-4">{{ $item->unit }}</td>
                            <td class="px-6 py-4 text-red-600">{{ $item->nearest_expiry ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $item->last_check ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $item->notes }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('consumable.detail', $item->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded text-xs">Detail & Stok</a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center py-4">Kosong</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout> 