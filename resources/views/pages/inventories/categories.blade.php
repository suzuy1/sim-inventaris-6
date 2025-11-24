<x-app-layout>
    <x-slot name="header">Pilih Kategori Inventaris</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($categories as $cat)
                <a href="{{ route('inventaris.items', $cat->id) }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-blue-50 transition transform hover:scale-105">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">{{ $cat->name }}</h5>
                    <p class="font-normal text-gray-700 text-center">Kelola aset {{ strtolower($cat->name) }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>