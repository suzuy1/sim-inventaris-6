<x-app-layout>
    <x-slot name="header">Edit Pengguna: {{ $user->name }}</x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold text-sm mb-2">Role</label>
                        <select name="role" class="w-full border-gray-300 rounded">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User Biasa</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                        </select>
                    </div>

                    <div class="border-t pt-4 mt-4">
                        <p class="text-sm font-bold text-gray-700 mb-2">Ganti Password (Opsional)</p>
                        <p class="text-xs text-gray-500 mb-2">Biarkan kosong jika tidak ingin mengubah password.</p>
                        
                        <div class="mb-4">
                            <input type="password" name="password" placeholder="Password Baru" class="w-full border-gray-300 rounded">
                        </div>

                        <div class="mb-4">
                            <input type="password" name="password_confirmation" placeholder="Ulangi Password Baru" class="w-full border-gray-300 rounded">
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>