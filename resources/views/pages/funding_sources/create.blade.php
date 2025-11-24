<x-app-layout>
    <x-slot name="header">Tambah Sumber Dana</x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('sumber-dana.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Kode Sumber Dana</label>
                        <input type="text" name="code" placeholder="Cth: YYS, BOS, HIBAH" class="w-full border-gray-300 rounded-md shadow-sm uppercase">
                        <p class="text-xs text-gray-500 mt-1">*Kode harus unik (Max 10 karakter)</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama Sumber Dana</label>
                        <input type="text" name="name" placeholder="Cth: Yayasan Kampus Merdeka" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>