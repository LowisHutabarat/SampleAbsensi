<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4 text-cyan-700">Ajukan Jadwal Pengganti</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
        @endif

        <form method="GET" action="{{ route('pengganti.create') }}" class="mb-6">
            <label class="block mb-2">Pilih Mata Kuliah:</label>
            <select name="kode_mata_kuliah" onchange="this.form.submit()" class="w-full p-2 border rounded">
                <option value="">-- Pilih --</option>
                @foreach($kodeMataKuliah as $kode => $nama)
                    <option value="{{ $kode }}" {{ $kode == $kodeDipilih ? 'selected' : '' }}>{{ $nama }}</option>
                @endforeach
            </select>
        </form>

        @if($sesiAwalId)
        <form action="{{ route('pengganti.store') }}" method="POST">
            @csrf
            <input type="hidden" name="sesi_awal_id" value="{{ $sesiAwalId }}">
            <input type="hidden" name="kode_mata_kuliah" value="{{ $kodeDipilih }}">

            <label class="block mb-2">Tanggal Pengganti:</label>
            <input type="date" name="tanggal" required class="w-full p-2 border rounded mb-4" />

            <label class="block mb-2">Jam Mulai:</label>
            <input type="time" name="jam_mulai" required class="w-full p-2 border rounded mb-4" />

            <label class="block mb-2">Jam Selesai:</label>
            <input type="time" name="jam_selesai" required class="w-full p-2 border rounded mb-4" />

            <label class="block mb-2">Ruang:</label>
            <input type="text" name="ruang" required class="w-full p-2 border rounded mb-4" />

            <button type="submit" class="bg-cyan-600 text-white px-4 py-2 rounded hover:bg-cyan-700">
                Ajukan
            </button>
        </form>
        @elseif($kodeDipilih)
        <div class="mt-4 p-4 bg-yellow-100 text-yellow-800 rounded">
            Tidak ada sesi <strong>pending</strong> untuk mata kuliah <strong>{{ $kodeDipilih }}</strong> yang bisa diajukan pengganti.
        </div>
        @endif
    </div>
</x-app-layout>
