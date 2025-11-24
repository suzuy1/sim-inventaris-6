<x-app-layout>
    <x-slot name="header">Tambah Pengguna Baru</x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Nama Lengkap</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Email</label>
                        <input type="email" name="email" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Role</label>
                        <select name="role" class="w-full border-gray-300 rounded">
                            <option value="user">User Biasa (Dosen/Staff)</option>
                            <option value="admin">Administrator</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Admin punya akses penuh. User hanya bisa mengajukan pengadaan.</p>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Password</label>
                        <input type="password" name="password" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold text-sm mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="flex justify-end">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700">Simpan User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 