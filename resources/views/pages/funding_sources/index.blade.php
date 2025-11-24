<x-app-layout>
    <x-slot name="header">Manajemen Sumber Dana</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4 flex justify-end">
                    <a href="{{ route('sumber-dana.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        + Tambah Sumber Dana
                    </a>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">Kode Sumber Dana</th>
                                <th class="px-6 py-3">Nama Sumber Dana</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fundings as $funding)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $funding->code }}</td>
                                <td class="px-6 py-4">{{ $funding->name }}</td>
                                <td class="px-6 py-4 flex gap-4">
                                    <a href="{{ route('sumber-dana.edit', $funding->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('sumber-dana.destroy', $funding->id) }}" method="POST" onsubmit="return confirm('Hapus sumber dana ini?');">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center">Belum ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>