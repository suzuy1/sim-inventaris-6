<x-app-layout>
    <x-slot name="header">Pusat Laporan (Reporting)</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-blue-600 text-center">
                    <h3 class="font-bold text-lg mb-2">Laporan Aset Tetap</h3>
                    <p class="text-sm text-gray-500 mb-4">Daftar seluruh inventaris fisik (Laptop, Meja, dll) per Ruangan.</p>
                    <a href="{{ route('report.asset') }}" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 block">
                        🖨️ Cetak PDF
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-green-600 text-center">
                    <h3 class="font-bold text-lg mb-2">Laporan Stok BHP</h3>
                    <p class="text-sm text-gray-500 mb-4">Posisi stok terakhir obat & ATK beserta tanggal kadaluarsa.</p>
                    <a href="{{ route('report.consumable') }}" target="_blank" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 block">
                        🖨️ Cetak PDF
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-yellow-600 text-center">
                    <h3 class="font-bold text-lg mb-2">Peminjaman Aktif</h3>
                    <p class="text-sm text-gray-500 mb-4">Daftar barang yang sedang dibawa/dipinjam dan belum kembali.</p>
                    <a href="{{ route('report.loan') }}" target="_blank" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700 block">
                        🖨️ Cetak PDF
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>