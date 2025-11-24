<x-app-layout>
    <x-slot name="header">Sirkulasi Peminjaman Aset</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('peminjaman.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded font-bold shadow">+ Pinjam Baru</a>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                        <tr>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Barang (Kode)</th>
                            <th class="px-6 py-3">Peminjam</th>
                            <th class="px-6 py-3">Tgl Pinjam</th>
                            <th class="px-6 py-3">Tenggat Kembali</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loans as $loan)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                @if($loan->status == 'dipinjam')
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded font-bold">DIPINJAM</span>
                                @elseif($loan->status == 'kembali')
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-bold">SELESAI</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded font-bold">TELAT</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900">{{ $loan->asset->inventory->name }}</div>
                                <div class="text-xs text-blue-600">{{ $loan->asset->unit_code }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold">{{ $loan->borrower_name }}</div>
                                <div class="text-xs">{{ $loan->borrower_id }}</div>
                            </td>
                            <td class="px-6 py-4">{{ $loan->loan_date }}</td>
                            <td class="px-6 py-4">
                                {{ $loan->return_date_plan }}
                                @if($loan->status == 'dipinjam' && now() > $loan->return_date_plan)
                                    <span class="text-red-600 text-xs font-bold block">(Lewat Jatuh Tempo!)</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($loan->status == 'dipinjam')
                                <form action="{{ route('peminjaman.return', $loan->id) }}" method="POST" onsubmit="return confirm('Konfirmasi pengembalian barang ini?');">
                                    @csrf @method('PUT')
                                    <input type="text" name="notes" placeholder="Catatan kondisi..." class="text-xs border-gray-300 rounded mb-1 w-full">
                                    <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700 w-full">
                                        Terima Kembali
                                    </button>
                                </form>
                                @else
                                <span class="text-gray-400 text-xs">Selesai: {{ $loan->return_date_actual }}</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4">Belum ada data peminjaman.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>