<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin: 30px;
            background-color: #f8f8f8;
        }

        h2 {
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 4px;
        }

        h4 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px 6px;
            text-align: center;
        }

        th {
            background-color: #0d6efd;
            color: #fff;
        }

        td {
            background-color: #fdfdfd;
        }

        tr:nth-child(even) td {
            background-color: #f5f5f5;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
        }

        .button-pdf {
            display: inline-block;
            margin-top: 10px;
            background-color: #0d6efd;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }

        .button-pdf:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>

    <h2>Laporan Absensi Mahasiswa</h2>
    <h4>Dosen: {{ $dosen->name }} ({{ $dosen->nomor_induk }})</h4>

    <hr>

    @php
        $daftarMahasiswa = collect();
        $jumlahPertemuan = $sesis->count();

        foreach ($sesis as $sesi) {
            foreach ($sesi->absensi as $absen) {
                $daftarMahasiswa->put($absen->mahasiswa->nomor_induk, [
                    'nama' => $absen->mahasiswa->name,
                    'nomor_induk' => $absen->mahasiswa->nomor_induk,
                ]);
            }
        }

        $daftarMahasiswa = $daftarMahasiswa->sortBy('nomor_induk');
    @endphp

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                @foreach ($sesis as $sesi)
                    <th>P{{ $loop->iteration }}</th>
                @endforeach
                <th>Total Hadir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarMahasiswa as $i => $mhs)
                @php
                    $totalHadir = 0;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mhs['nomor_induk'] }}</td>
                    <td style="text-align: left;">{{ $mhs['nama'] }}</td>
                    @foreach ($sesis as $sesi)
                        @php
                            $hadir = $sesi->absensi->contains('nomor_induk', $mhs['nomor_induk']);
                            if ($hadir) $totalHadir++;
                        @endphp
                        <td>{{ $hadir ? 'Hadir' : '-' }}</td>
                    @endforeach
                    <td><strong>{{ $totalHadir }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (!app()->runningInConsole() && !request()->is('laporan-absensi/pdf'))
        <div class="footer">
            <a href="{{ route('laporan.absensi.pdf') }}" class="button-pdf" target="_blank">
                📄 Cetak PDF
            </a>
        </div>
    @endif

</body>
</html>
