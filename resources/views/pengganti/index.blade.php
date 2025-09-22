<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 bg-white rounded shadow mt-6">
        <h2 class="text-2xl font-bold mb-4 text-cyan-700">Daftar Pengajuan Sesi Pengganti</h2>

        @if(session('success'))
            <div class="p-4 bg-green-100 text-green-800 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($pengganti->count())
            <table class="w-full table-auto border">
                <thead class="bg-cyan-100">
                    <tr>
                        <th class="px-4 py-2 border">Mata Kuliah</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Jam</th>
                        <th class="px-4 py-2 border">Ruang</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengganti as $item)
                        <tr>
                            <td class="px-4 py-2 border">{{ $item->kode_mata_kuliah }}</td>
                            <td class="px-4 py-2 border">{{ $item->tanggal_pengganti }}</td>
                            <td class="px-4 py-2 border">{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                            <td class="px-4 py-2 border">{{ $item->ruang }}</td>
                            <td class="px-4 py-2 border capitalize">{{ $item->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">Belum ada pengajuan sesi pengganti.</p>
        @endif
    </div>
</x-app-layout>
