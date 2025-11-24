<x-app-layout>
    <x-slot name="header">Daftar {{ $category->name }}</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <form action="{{ route('inventaris.store') }}" method="POST" class="flex gap-4 items-end">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    
                    <div class="flex-1">
                        <label class="block text-sm font-bold text-gray-700">Nama Barang / Aset</label>
                        <input type="text" name="name" placeholder="Cth: Laptop Acer Aspire" class="w-full border-gray-300 rounded focus:ring-blue-500">
                    </div>
                    
                    <div class="flex-[2]">
                        <label class="block text-sm font-bold text-gray-700">Keterangan Singkat</label>
                        <input type="text" name="description" placeholder="Opsional" class="w-full border-gray-300 rounded focus:ring-blue-500">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700 mb-0.5">
                        + Simpan
                    </button>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">Nama Aset</th>
                            <th class="px-6 py-3 text-center">Total Unit</th>
                            <th class="px-6 py-3">Rincian Kondisi</th>
                            <th class="px-6 py-3">Keterangan</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-bold text-gray-900 text-lg">
                                {{ $item->name }}
                            </td>
                            
                            <td class="px-6 py-4 text-center">
                                <span class="bg-gray-100 text-gray-800 text-sm font-bold px-3 py-1 rounded-full">
                                    {{ $item->total_unit }} Unit
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <div class="flex flex-col items-center p-2 bg-green-50 rounded border border-green-200 min-w-[60px]">
                                        <span class="text-xs text-green-600 font-bold">Baik</span>
                                        <span class="text-lg font-bold text-green-700">{{ $item->baik }}</span>
                                    </div>
                                    
                                    <div class="flex flex-col items-center p-2 bg-yellow-50 rounded border border-yellow-200 min-w-[60px]">
                                        <span class="text-xs text-yellow-600 font-bold">R.Ringan</span>
                                        <span class="text-lg font-bold text-yellow-700">{{ $item->rusak_ringan }}</span>
                                    </div>

                                    <div class="flex flex-col items-center p-2 bg-red-50 rounded border border-red-200 min-w-[60px]">
                                        <span class="text-xs text-red-600 font-bold">R.Berat</span>
                                        <span class="text-lg font-bold text-red-700">{{ $item->rusak_berat }}</span>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-gray-500 italic">
                                {{ $item->description ?? '-' }}
                            </td>
                            
                            <td class="px-6 py-4">
                                <a href="{{ route('asset.index', $item->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Lihat Detail
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                Belum ada daftar inventaris di kategori ini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>