<x-app-layout>
    <div class="p-6 bg-white min-h-screen">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Daftar Dosen</h2>

        <a href="{{ route('dosen.create') }}"
           class="mb-4 inline-block bg-cyan-700 text-white px-4 py-2 rounded hover:bg-cyan-800">
           Tambah Dosen
        </a>

        <table class="mt-6 w-full table-auto border-collapse border border-gray-300 bg-white text-gray-800">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nomor Induk</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $index => $dosen)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $dosen->nomor_induk }}</td>
                        <td class="border px-4 py-2">{{ $dosen->name }}</td>
                        <td class="border px-4 py-2">{{ $dosen->email }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('dosen.edit', $dosen->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
