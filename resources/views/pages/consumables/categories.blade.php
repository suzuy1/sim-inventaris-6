<x-app-layout>
    <x-slot name="header">Barang Habis Pakai (BHP)</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($categories as $cat)
                <a href="{{ route('bhp.items', $cat->id) }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-green-50 transition transform hover:scale-105">
                    <div class="text-center">
                        <svg class="w-10 h-10 mx-auto mb-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $cat->name }}</h5>
                        <p class="font-normal text-gray-700">Kelola stok & kadaluarsa {{ strtolower($cat->name) }}</p>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center p-10 bg-white rounded shadow">
                    <p class="text-red-500 font-bold">Belum ada Kategori tipe 'Consumable'.</p>
                    <p class="text-sm text-gray-500">Pastikan Anda sudah menjalankan seeder CategorySeeder yang baru.</p>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>