<h2>Absensi Sesi {{ $sesi->mataKuliah->nama }}</h2>
<form method="POST" action="{{ route('absen.submit', $sesi->kode_qr) }}">
    @csrf
    <p>Scan Berhasil. Klik tombol untuk absen.</p>
    <button type="submit">Absen Sekarang</button>
</form>
