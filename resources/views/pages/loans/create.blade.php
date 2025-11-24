<x-app-layout>
    <x-slot name="header">Form Peminjaman Aset</x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow border-l-4 border-blue-600">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Pilih Aset (Hanya yang Tersedia)</label>
                        <select name="asset_detail_id" class="w-full border-gray-300 rounded focus:ring-blue-500" required>
                            <option value="">-- Cari Barang --</option>
                            @foreach($inventories as $inv)
                                <optgroup label="{{ $inv->name }}">
                                    @foreach($inv->details as $unit)
                                        @if($unit->status == 'tersedia')
                                        <option value="{{ $unit->id }}">
                                            Kode: {{ $unit->unit_code }} | Kondisi: {{ ucfirst($unit->condition) }}
                                        </option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-bold text-sm mb-2">Nama Peminjam</label>
                            <input type="text" name="borrower_name" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div>
                            <label class="block font-bold text-sm mb-2">NIM / NIP</label>
                            <input type="text" name="borrower_id" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div>
                            <label class="block font-bold text-sm mb-2">No. HP / WA</label>
                            <input type="text" name="phone" class="w-full border-gray-300 rounded">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-bold text-sm mb-2">Tanggal Pinjam</label>
                            <input type="date" name="loan_date" value="{{ date('Y-m-d') }}" class="w-full border-gray-300 rounded">
                        </div>
                        <div>
                            <label class="block font-bold text-sm mb-2">Rencana Kembali</label>
                            <input type="date" name="return_date_plan" class="w-full border-gray-300 rounded" required>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block font-bold text-sm mb-2">Keperluan</label>
                        <textarea name="notes" class="w-full border-gray-300 rounded"></textarea>
                    </div>

                    <button class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700">Simpan Peminjaman</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 