<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Jadwal Reguler - {{ $dosen->name }}</h2>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Hari</th>
                    <th class="border px-4 py-2">Mata Kuliah</th>
                    <th class="border px-4 py-2">Jam</th>
                    <th class="border px-4 py-2">Ruang</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwal as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->hari }}</td>
                    <td class="border px-4 py-2">{{ $item->matkul }}</td>
                    <td class="border px-4 py-2">{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                    <td class="border px-4 py-2">{{ $item->ruang }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center border px-4 py-2">Tidak ada jadwal.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
