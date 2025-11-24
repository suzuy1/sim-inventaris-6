<x-app-layout>
    <x-slot name="header">Riwayat Transaksi BHP (Kartu Stok)</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-end mb-4">
                <a href="{{ route('transaksi.create') }}" class="bg-red-600 text-white px-4 py-2 rounded font-bold hover:bg-red-700 shadow">
                    - Catat Barang Keluar
                </a>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                        <tr>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Jenis</th>
                            <th class="px-6 py-3">Barang (Batch)</th>
                            <th class="px-6 py-3">Jumlah</th>
                            <th class="px-6 py-3">Keterangan</th>
                            <th class="px-6 py-3">Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $t)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $t->date }}</td>
                            <td class="px-6 py-4">
                                @if($t->type == 'masuk')
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-bold">MASUK</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded font-bold">KELUAR</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900">{{ $t->detail->consumable->name }}</div>
                                <div class="text-xs text-blue-600">{{ $t->detail->batch_code }}</div>
                            </td>
                           <td class="px-6 py-4 font-bold text-lg {{ $t->type == 'masuk' ? 'text-green-600' : 'text-red-600' }}">
    {{ $t->type == 'masuk' ? '+' : '-' }}{{ $t->amount }}
</td>
                            <td class="px-6 py-4">{{ $t->notes }}</td>
                            <td class="px-6 py-4 text-xs">{{ $t->user->name }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4">Belum ada transaksi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="p-4">{{ $transactions->links() }}</div>
            </div>

        </div>
    </div>
</x-app-layout>