<x-app-layout>
    <div class="p-6 bg-white min-h-screen">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Daftar Mata Kuliah</h2>

        <a href="{{ route('mata-kuliah.create') }}"
           class="mb-4 inline-block bg-cyan-700 text-white px-4 py-2 rounded hover:bg-cyan-800">
           Tambah Mata Kuliah
        </a>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse border border-gray-300 bg-white text-gray-800 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2">No</th>
                    <th class="border px-3 py-2">Kode</th>
                    <th class="border px-3 py-2">Nama</th>
                    <th class="border px-3 py-2">SKS</th>
                    <th class="border px-3 py-2">Dosen</th>
                    <th class="border px-3 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matakuliahs as $i => $mk)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-3 py-2 text-center">{{ $i + 1 }}</td>
                        <td class="border px-3 py-2">{{ $mk->kode }}</td>
                        <td class="border px-3 py-2">{{ $mk->nama }}</td>
                        <td class="border px-3 py-2 text-center">{{ $mk->sks }}</td>
                        <td class="border px-3 py-2">
                            {{ optional($mk->dosens->first())->name ?? '-' }}
                            ({{ optional($mk->dosens->first())->nomor_induk ?? '-' }})
                        </td>
                        <td class="border px-3 py-2 space-x-2 text-center">
                            <a href="{{ route('mata-kuliah.edit', $mk->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('mata-kuliah.destroy', $mk->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-4 text-gray-500">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
