<x-app-layout>
    <div class="flex min-h-screen bg-cyan-50">
        <!-- Sidebar -->
        <aside class="w-64 bg-cyan-700 text-white p-6 space-y-6">
            <h2 class="text-2xl font-bold border-b border-cyan-500 pb-4">Menu</h2>
            <ul class="space-y-3">
                <a href="{{ route('sesi.create') }}" class="block py-2 px-4 rounded hover:bg-cyan-600">Absensi</a>
                <a href="{{ route('jadwal.dosen') }}" class="block py-2 px-4 rounded hover:bg-cyan-600">Jadwal Reguler</a>
                <li><a href="{{ route('pengganti.index') }}" class="block py-2 px-4 rounded hover:bg-cyan-600">Penjadwalan Pengganti</a></li>
                <li><a href="{{ route('laporan.absensi') }}" class="block py-2 px-4 rounded hover:bg-cyan-600">Riwayat Absensi</a></li>

                <!-- Dropdown Monitoring -->
                <li x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="w-full text-left py-2 px-4 rounded hover:bg-cyan-600 flex justify-between items-center">
                        Monitoring
                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="open" class="pl-4 space-y-1 text-sm">
                        <li><a href="{{ route('dosen.index') }}" class="block py-1 px-2 rounded hover:bg-cyan-600">Kelola Dosen</a></li>
                        <li><a href="{{ route('mata-kuliah.index') }}" class="block py-1 px-2 rounded hover:bg-cyan-600">Kelola Mata Kuliah</a></li>
                        <li><a href="{{ route('pengganti.admin.index') }}" class="block py-1 px-2 rounded hover:bg-cyan-600">Riwayat Pembelajaran</a></li>
                        <li><a href="{{ route('mahasiswa.index') }}" class="block py-1 px-2 rounded hover:bg-cyan-600">Kelola Mahasiswa</a></li>

                    </ul>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10 bg-gray-100">
            <h1 class="text-3xl font-semibold text-cyan-700 mb-6 text-center">Universitas Methodist Indonesia</h1>

            <div class="container mx-auto py-6">
                <h2 class="text-xl font-bold mb-4">Roster Reguler</h2>

                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4">{{ session('success') }}</div>
                @endif

                <!-- Form Tambah/Edit (hanya admin akademik) -->
                @if (Auth::check() && Auth::user()->role === 'admin_akademik')
                    <form method="POST" action="{{ isset($roster) ? route('roster.update', $roster->id) : route('roster.store') }}" class="grid grid-cols-2 gap-4 mb-6">
                        @csrf
                        @if (isset($roster))
                            @method('PUT')
                        @endif

                        <input name="prodi" placeholder="Prodi" required class="p-2 border rounded" value="{{ old('prodi', $roster->prodi ?? '') }}">
                        <input name="semester" placeholder="Semester" type="number" min="1" max="8" required class="p-2 border rounded" value="{{ old('semester', $roster->semester ?? '') }}">

                        <select name="kode_mata_kuliah" required class="p-2 border rounded" onchange="updateNamaMK(this)">
                            <option value="">Pilih Mata Kuliah</option>
                            @foreach ($mataKuliahs as $mk)
                                <option value="{{ $mk->kode }}" data-nama="{{ $mk->nama }}" data-sks="{{ $mk->sks }}"
                                    {{ old('kode_mata_kuliah', $roster->kode_mata_kuliah ?? '') == $mk->kode ? 'selected' : '' }}>
                                    {{ $mk->kode }} - {{ $mk->nama }}
                                </option>
                            @endforeach
                        </select>

                        <input type="text" name="nama_mata_kuliah" placeholder="Nama MK" required class="p-2 border rounded bg-gray-100" readonly value="{{ old('nama_mata_kuliah', $roster->nama_mata_kuliah ?? '') }}">
                        <input name="hari" placeholder="Hari (Senin, Selasa)" required class="p-2 border rounded" value="{{ old('hari', $roster->hari ?? '') }}">
                        <input type="text" name="sks" placeholder="SKS" required class="p-2 border rounded bg-gray-100" readonly value="{{ old('sks', $roster->sks ?? '') }}">
                        <select name="nomor_induk_dosen" required class="p-2 border rounded" onchange="updateNamaDosen(this)">
                            <option value="">Pilih Dosen</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{ $dosen->nomor_induk }}" data-nama="{{ $dosen->name }}"
                                    {{ old('nomor_induk_dosen', $roster->nomor_induk_dosen ?? '') == $dosen->nomor_induk ? 'selected' : '' }}>
                                    {{ $dosen->nomor_induk }} - {{ $dosen->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" name="nama_dosen" placeholder="Nama Dosen" required class="p-2 border rounded bg-gray-100" readonly value="{{ old('nama_dosen', $roster->nama_dosen ?? '') }}">
                        <input type="time" name="jam_mulai" required class="p-2 border rounded" value="{{ old('jam_mulai', $roster->jam_mulai ?? '') }}">
                        <input name="ruang" placeholder="Ruang" required class="p-2 border rounded" value="{{ old('ruang', $roster->ruang ?? '') }}">
                        <input type="time" name="jam_selesai" required class="p-2 border rounded" value="{{ old('jam_selesai', $roster->jam_selesai ?? '') }}">


                        <div class="col-span-2 flex justify-between">
                            <button type="submit" class="{{ isset($roster) ? 'bg-yellow-600' : 'bg-blue-600' }} text-white px-4 py-2 rounded">
                                {{ isset($roster) ? 'Update' : 'Tambah' }}
                            </button>
                            @if (isset($roster))
                                <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal Edit</a>
                            @endif
                        </div>
                    </form>
                @endif

<!-- Filter -->
                <form method="GET" action="{{ route('dashboard') }}" class="flex gap-4 mb-6">
                    <select name="prodi" class="p-2 border rounded">
                        <option value="">Pilih Prodi</option>
                        <option value="Sistem Informasi" {{ request('prodi') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                        <option value="Teknik Informatika" {{ request('prodi') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                        <option value="Pendidikan Teknologi Informasi" {{ request('prodi') == 'Pendidikan Teknologi Informasi' ? 'selected' : '' }}>Pendidikan Teknologi Informasi</option>
                    </select>
                    <select name="semester" class="p-2 border rounded">
                        <option value="">Semester</option>
                        @foreach ([2,4,6] as $s)
                            <option value="{{ $s }}" {{ request('semester') == $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-cyan-600 text-white px-4 py-2 rounded">Filter</button>
                </form>

                <!-- Tabel -->
                <table class="w-full text-sm text-left border">
                    <thead class="bg-gray-200 text-black">
                        <tr>
                            <th class="px-4 py-2 border">Prodi</th>
                            <th class="px-4 py-2 border">Semester</th>
                            <th class="px-4 py-2 border">Mata Kuliah</th>
                            <th class="px-4 py-2 border">SKS</th>
                            <th class="px-4 py-2 border">Dosen</th>
                            <th class="px-4 py-2 border">Hari</th>
                            <th class="px-4 py-2 border">Jam</th>
                            <th class="px-4 py-2 border">Ruang</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rosters as $r)
                            <tr>
                                <td class="border px-4 py-2">{{ $r->prodi }}</td>
                                <td class="border px-4 py-2">{{ $r->semester }}</td>
                                <td class="border px-4 py-2">{{ $r->kode_mata_kuliah }} - {{ $r->nama_mata_kuliah }}</td>
                                <td class="border px-4 py-2">{{ $r->sks }}</td>
                                <td class="border px-4 py-2">{{ $r->nama_dosen }} ({{ $r->nomor_induk_dosen }})</td>
                                <td class="border px-4 py-2">{{ $r->hari }}</td>
                                <td class="border px-4 py-2">{{ $r->jam_mulai }} - {{ $r->jam_selesai }}</td>
                                <td class="border px-4 py-2">{{ $r->ruang }}</td>
                                <td class="border px-4 py-2">
                                    @if (Auth::check() && Auth::user()->role === 'admin_akademik')
                                        <a href="{{ route('roster.edit', $r->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Edit</a>
                                        <form action="{{ route('roster.destroy', $r->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button class="bg-red-500 text-white px-2 py-1 rounded text-xs">Hapus</button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 italic text-xs">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-gray-500 py-4">Belum ada data roster ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        function updateNamaMK(select) {
            const selected = select.options[select.selectedIndex];
            document.querySelector('input[name="nama_mata_kuliah"]').value = selected.dataset.nama;
            document.querySelector('input[name="sks"]').value = selected.dataset.sks;
        }

        function updateNamaDosen(select) {
            const selected = select.options[select.selectedIndex];
            document.querySelector('input[name="nama_dosen"]').value = selected.dataset.nama;
        }
    </script>
</x-app-layout>
