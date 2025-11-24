<x-app-layout>
<x-slot name="header">Edit Sumber Dana</x-slot>

<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <!-- 
                FORM ACTION: Mengarah ke route 'sumber-dana.update' dan mengirimkan objek $sumber_dana.
                Laravel akan secara otomatis menggunakan ID-nya.
            -->
            <form action="{{ route('sumber-dana.update', $sumber_dana) }}" method="POST">
                @csrf
                <!-- 
                    METHOD OVERRIDE: 
                    Browser hanya mendukung GET dan POST. 
                    @method('PUT') memberi tahu Laravel bahwa ini adalah permintaan PUT untuk update. 
                -->
                @method('PUT')
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="code">Kode Sumber Dana</label>
                    <input 
                        type="text" 
                        name="code" 
                        id="code"
                        placeholder="Cth: YYS, BOS, HIBAH" 
                        class="w-full border-gray-300 rounded-md shadow-sm uppercase"
                        value="{{ old('code', $sumber_dana->code) }}"
                        required
                    >
                    <p class="text-xs text-gray-500 mt-1">*Kode harus unik (Max 10 karakter)</p>
                    <!-- Tambahkan penanganan error jika ada validasi -->
                    @error('code')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="name">Nama Sumber Dana</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        placeholder="Cth: Yayasan Kampus Merdeka" 
                        class="w-full border-gray-300 rounded-md shadow-sm"
                        value="{{ old('name', $sumber_dana->name) }}"
                        required
                    >
                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BLOK TOMBOL INI DIPASTIKAN ADA DAN TERLIHAT -->
                <div class="flex justify-end mt-6"> 
                    <a href="{{ route('sumber-dana.index') }}" class="text-gray-600 px-4 py-2 rounded mr-2 hover:bg-gray-100">Batal</a>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 shadow-lg transition duration-150">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


</x-app-layout>