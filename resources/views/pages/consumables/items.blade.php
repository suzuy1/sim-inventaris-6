<x-app-layout>
    <x-slot name="header">Daftar {{ $category->name }}</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
          <div class="flex justify-between items-center mb-6">
    <div>
        <h3 class="text-lg font-bold text-gray-800">Stok Gudang: {{ $category->name }}</h3>
        <p class="text-sm text-gray-500">Kelola item dan monitoring kadaluarsa.</p>
    </div>
    <a href="{{ route('bhp.create', $category->id) }}" class="bg-green-600 text-white px-5 py-2.5 rounded-lg font-bold hover:bg-green-700 shadow transition flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Registrasi Item Baru
    </a>
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