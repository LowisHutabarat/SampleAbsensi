<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4 text-cyan-700">Tambah Mahasiswa</h2>

        <form action="{{ route('mahasiswa.store') }}" method="POST" class="grid grid-cols-2 gap-4">
            @csrf

            <input name="nomor_induk" placeholder="Nomor Induk" required class="p-2 border rounded" value="{{ old('nomor_induk') }}">
            <input name="name" placeholder="Nama" required class="p-2 border rounded" value="{{ old('name') }}">

            <select name="prodi" required class="p-2 border rounded">
                <option value="">Pilih Prodi</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi }}" {{ old('prodi') == $prodi ? 'selected' : '' }}>{{ $prodi }}</option>
                @endforeach
            </select>

            <select name="angkatan" required class="p-2 border rounded">
                <option value="">Pilih Angkatan</option>
                @foreach ($angkatans as $angkatan)
                    <option value="{{ $angkatan }}" {{ old('angkatan') == $angkatan ? 'selected' : '' }}>{{ $angkatan }}</option>
                @endforeach
            </select>

            <input name="email" type="email" placeholder="Email" required class="p-2 border rounded" value="{{ old('email') }}">
            <input name="password" type="password" placeholder="Password" required class="p-2 border rounded">
<input name="password_confirmation" type="password" placeholder="Konfirmasi Password" required class="p-2 border rounded">


            <div class="col-span-2">
                <button type="submit" class="bg-cyan-700 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="ml-2 text-cyan-700">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
