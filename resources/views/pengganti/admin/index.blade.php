<x-app-layout>
    <div class="min-h-screen py-6" style="background-color: #e0f7fa;"> {{-- Cyan-ish background --}}
        <div class="container mx-auto px-4 text-gray-800">
            <h2 class="text-xl font-bold mb-4">Daftar Pengajuan Sesi Pengganti</h2>

            {{-- Filter NIDN --}}
            <form method="GET" action="{{ route('pengganti.admin.index') }}" class="mb-6">
                <label for="nidn" class="block text-sm font-semibold mb-1">Filter berdasarkan NIDN:</label>
                <div class="flex gap-2">
                    <select name="nidn" id="nidn" class="px-3 py-1 rounded border border-gray-300">
                        <option value="">Semua Dosen</option>
                        @foreach ($daftarDosen as $dosen)
                            <option value="{{ $dosen->nomor_induk }}" {{ request('nidn') == $dosen->nomor_induk ? 'selected' : '' }}>
                                {{ $dosen->nomor_induk }} - {{ $dosen->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded">Terapkan</button>
                </div>
            </form>

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="bg-red-500 text-white p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Tabel Pengajuan --}}
            <table class="table-auto w-full border text-sm text-left bg-white mb-12 shadow rounded">
                <thead class="bg-blue-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Dosen (NIDN)</th>
                        <th class="px-4 py-2 border">Mata Kuliah</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Jam</th>
                        <th class="px-4 py-2 border">Ruang</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuan as $index => $item)
                        <tr class="border-t hover:bg-blue-50">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $item->nomor_induk_dosen }}</td>
                            <td class="px-4 py-2 border">{{ $item->mataKuliah->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($item->tanggal_pengganti)->format('d M Y') }}</td>
                            <td class="px-4 py-2 border">
                                {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                            </td>
                            <td class="px-4 py-2 border">{{ $item->ruang }}</td>
                            <td class="px-4 py-2 border">
    @if($item->status == 'pending')
        {{-- Corrected 'Setujui' form --}}
        <form action="{{ route('pengganti.approve', $item->id) }}" method="POST" class="inline">
            @csrf
            @method('PATCH') {{-- This line makes Laravel recognize it as PATCH --}}
            <button class="bg-green-500 text-white px-2 py-1 rounded text-xs">Setujui</button>
        </form>

        {{-- Corrected 'Tolak' form (assuming it also uses PATCH for status update) --}}
        <form action="{{ route('pengganti.reject', $item->id) }}" method="POST" class="inline ml-1">
            @csrf
            @method('PATCH') {{-- This line makes Laravel recognize it as PATCH --}}
            <button class="bg-red-500 text-white px-2 py-1 rounded text-xs">Tolak</button>
        </form>
    @else
        <span class="px-2 py-1 rounded bg-gray-200 text-gray-800">
            {{ ucfirst($item->status) }}
        </span>
    @endif
</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center px-4 py-2 border">Tidak ada pengajuan sesi pengganti.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Tabel Sesi --}}
            <h2 class="text-lg font-bold mt-10 mb-2">Daftar Sesi Kuliah</h2>
            <table class="w-full table-auto border bg-white text-gray-800 shadow rounded">
                <thead class="bg-teal-100">
                    <tr>
                        <th class="px-4 py-2 border">Nomor Induk Pengampu</th>
                        <th class="px-4 py-2 border">Nama Dosen</th>
                        <th class="px-4 py-2 border">Mata Kuliah</th>
                        <th class="px-4 py-2 border">Pertemuan</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Jam</th>
                        <th class="px-4 py-2 border">Berita Acara</th>
                        <th class="px-4 py-2 border">Dokumentasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sesi as $item)
                        <tr class="hover:bg-blue-50">
                            <td class="px-4 py-2 border">{{ $item->nomor_induk_dosen }}</td>
                            <td class="px-4 py-2 border">{{ $item->dosen->name ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $item->mataKuliah->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $item->pertemuan }}</td>
                            <td class="px-4 py-2 border">
                                {{ \Carbon\Carbon::parse($item->mulai)->translatedFormat('d-m-Y') }}
                            </td>
                            <td class="px-4 py-2 border">
                                {{ \Carbon\Carbon::parse($item->mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->berakhir)->format('H:i') }}
                            </td>
                            <td class="px-4 py-2 border">{{ $item->berita_acara ?? '-' }}</td>
                            <td class="px-4 py-2 border">
                                @if ($item->dokumentasi)
                                    <a href="{{ asset('storage/' . $item->dokumentasi) }}" class="text-blue-600 underline" target="_blank">Lihat</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-2 text-center border">Tidak ada sesi kuliah</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
