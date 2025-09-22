<x-app-layout>
    <h2>Scan QR untuk Absensi</h2>
    @if (session('message'))
        <p style="color: green">{{ session('message') }}</p>
    @endif
    <form action="{{ route('absensi.process') }}" method="POST">
        @csrf
        <label>Kode QR:</label>
        <input type="text" name="kode_qr" required>
        <button type="submit">Absen</button>
    </form>
</x-app-layout>
