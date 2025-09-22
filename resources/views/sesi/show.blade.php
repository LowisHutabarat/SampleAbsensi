<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white p-6 mt-6 rounded shadow text-center">
        <h1 class="text-2xl font-bold text-cyan-700 mb-4">Sesi Aktif: {{ $sesi->mataKuliah->nama }}</h1>

        <p class="mb-2">Pertemuan ke-{{ $sesi->pertemuan }}</p>
        <p class="mb-2 text-gray-700">Dosen: {{ $sesi->nomor_induk_dosen }}</p>

        {{-- Baris ini akan menampilkan waktu real-time SAAT HALAMAN DIMUAT (STATIS) --}}
        <p class="mb-2 text-gray-700">Berakhir: <span class="font-bold text-green-600">{{ now()->format('H.i.s') }}</span></p>

        <center><div class="mt-4 center">
            {!! QrCode::size(200)->generate(route('absensi.scan', ['kode' => $sesi->kode_qr])) !!}
        </div></center>

        <a href="{{ route('sesi.close.form', $sesi->id) }}" class="mt-6 inline-block bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Tutup Sesi
        </a>
    </div>

    {{-- KODE JAVASCRIPT UNTUK REAL-TIME DIHAPUS SEPENUHNYA --}}
    {{-- Karena Anda tidak ingin waktu bergerak/dinamis --}}
</x-app-layout>
