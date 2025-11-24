<x-app-layout>
    <x-slot name="header">Daftar Usulan Pengadaan</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-end mb-4">
                <a href="{{ route('pengadaan.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded font-bold hover:bg-purple-700 shadow">+ Usulan Baru</a>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                        <tr>
                            <th class="px-6 py-3">Tgl</th>
                            <th class="px-6 py-3">Pengusul</th>
                            <th class="px-6 py-3">Barang & Spek</th>
                            <th class="px-6 py-3">Jml</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Catatan Admin</th>
                            <th class="px-6 py-3 text-center">Aksi Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $req)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $req->created_at->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $req->requestor_name }}</td>
                            <td class="px-6 py-4">
                                <div class="font-bold">{{ $req->item_name }}</div>
                                <div class="text-xs text-gray-500">{{ $req->type == 'asset' ? 'Aset Tetap' : 'BHP' }}</div>
                                <div class="text-xs italic mt-1">{{Str::limit($req->description, 50)}}</div>
                            </td>
                            <td class="px-6 py-4 font-bold">{{ $req->quantity }}</td>
                            
                            <td class="px-6 py-4">
                                @if($req->status == 'pending')
                                    <span class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded font-bold">MENUNGGU</span>
                                @elseif($req->status == 'approved')
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded font-bold">DISETUJUI</span>
                                @elseif($req->status == 'completed')
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-bold">SELESAI</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded font-bold">DITOLAK</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-xs">{{ $req->admin_note ?? '-' }}</td>

                            <td class="px-6 py-4 text-center">
                                @if(Auth::user()->role == 'admin') 

                                    @if($req->status == 'pending')
                                        <div class="flex gap-1 justify-center">
                                            <form action="{{ route('pengadaan.updateStatus', $req->id) }}" method="POST">
                                                @csrf @method('PUT')
                                                <input type="hidden" name="status" value="approved">
                                                <input type="hidden" name="admin_note" value="Disetujui.">
                                                <button class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700" onclick="return confirm('ACC?')">ACC</button>
                                            </form>
                                            
                                            <form action="{{ route('pengadaan.updateStatus', $req->id) }}" method="POST">
                                                @csrf @method('PUT')
                                                <input type="hidden" name="status" value="rejected">
                                                <input type="hidden" name="admin_note" value="Ditolak.">
                                                <button class="bg-red-600 text-white px-2 py-1 rounded text-xs hover:bg-red-700" onclick="return confirm('Tolak?')">Tolak</button>
                                            </form>
                                        </div>
                                    @elseif($req->status == 'approved')
                                        <form action="{{ route('pengadaan.updateStatus', $req->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="completed">
                                            <input type="hidden" name="admin_note" value="Selesai.">
                                            <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700" onclick="return confirm('Selesai?')">
                                                ✔ Selesai
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs">-</span>
                                    @endif

                                @else
                                    
                                    @if($req->status == 'pending')
                                        <span class="text-xs text-gray-500 italic">Menunggu Persetujuan Admin</span>
                                    @elseif($req->status == 'approved')
                                        <span class="text-xs text-blue-600 font-bold">Sedang Diproses (ACC)</span>
                                    @elseif($req->status == 'completed')
                                        <span class="text-xs text-green-600 font-bold">✔ Selesai</span>
                                    @elseif($req->status == 'rejected')
                                        <span class="text-xs text-red-500 font-bold">Ditolak</span>
                                    @endif

                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center py-4">Belum ada usulan pengadaan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="p-4">{{ $requests->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>