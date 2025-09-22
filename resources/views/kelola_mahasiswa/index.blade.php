<x-app-layout>
    <div class="p-6 bg-white min-h-screen text-gray-800">

        {{-- Judul halaman --}}
        <h2 class="text-2xl font-extrabold mb-4">Kelola Mahasiswa</h2>

        {{-- ====== AKSI & FILTER ====== --}}
        <div class="flex flex-wrap justify-between items-end mb-6 gap-4">

            {{-- Tombol tambah --}}
            <a href="{{ route('mahasiswa.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
                + Tambah Mahasiswa
            </a>

            {{-- Form filter --}}
            <form method="GET" action="{{ route('mahasiswa.index') }}" class="flex flex-wrap gap-4 items-end">

                {{-- Prodi --}}
                <div>
                    <label class="block text-xs font-semibold mb-1">Prodi</label>
                    <select name="prodi"
                            class="border rounded px-3 py-[6px] text-sm min-w-[160px]">
                        <option value="">Semua</option>
                        @foreach ($prodis as $prodi)
                            <option value="{{ $prodi }}"
                                {{ request('prodi') == $prodi ? 'selected' : '' }}>
                                {{ $prodi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Angkatan --}}
                <div>
                    <label class="block text-xs font-semibold mb-1">Angkatan</label>
                    <select name="angkatan"
                            class="border rounded px-3 py-[6px] text-sm min-w-[120px]">
                        <option value="">Semua</option>
                        @foreach ($angkatans as $angkatan)
                            <option value="{{ $angkatan }}"
                                {{ request('angkatan') == $angkatan ? 'selected' : '' }}>
                                {{ $angkatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol apply + reset --}}
                <div class="flex gap-2 mt-5">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded text-sm shadow">
                        Terapkan Filter
                    </button>
                    <a href="{{ route('mahasiswa.index') }}"
                       class="text-sm text-gray-600 underline self-center">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        {{-- Flash message --}}
        @if(session('success'))
            <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-300 shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- ====== TABEL MAHASISWA ====== --}}
        <div class="overflow-x-auto rounded shadow ring-1 ring-gray-200">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-800">
                    <tr class="font-semibold">
                        <th class="px-4 py-3 border w-12 text-center">No</th>
                        <th class="px-4 py-3 border">NPM</th>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border">Prodi</th>
                        <th class="px-4 py-3 border">Angkatan</th>
                        <th class="px-4 py-3 border text-center w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($mahasiswas as $i => $mhs)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border text-center">{{ $i + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $mhs->nomor_induk }}</td>
                            <td class="px-4 py-2 border">{{ $mhs->name }}</td>
                            <td class="px-4 py-2 border">{{ $mhs->email }}</td>
                            <td class="px-4 py-2 border">{{ $mhs->mahasiswa->prodi ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $mhs->mahasiswa->angkatan ?? '-' }}</td>
                            <td class="px-4 py-2 border text-center whitespace-nowrap">
                                <a href="{{ route('mahasiswa.edit', $mhs->nomor_induk) }}"
                                   class="text-blue-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $mhs->nomor_induk) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Hapus data mahasiswa ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-4">Tidak ada data mahasiswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
