<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4 text-cyan-700">Edit Mahasiswa</h2>

        <form action="{{ route('mahasiswa.update', $user->nomor_induk) }}" method="POST" class="grid grid-cols-2 gap-4">
            @csrf @method('PUT')

            <input name="nomor_induk" value="{{ $user->nomor_induk }}" readonly class="p-2 border rounded bg-gray-100">
            <input name="name" value="{{ $user->name }}" required class="p-2 border rounded">

            <select name="prodi" required class="p-2 border rounded">
                <option value="">Pilih Prodi</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi }}" {{ $mahasiswa->prodi == $prodi ? 'selected' : '' }}>{{ $prodi }}</option>
                @endforeach
            </select>

            <select name="angkatan" required class="p-2 border rounded">
                <option value="">Pilih Angkatan</option>
                @foreach ($angkatans as $angkatan)
                    <option value="{{ $angkatan }}" {{ $mahasiswa->angkatan == $angkatan ? 'selected' : '' }}>{{ $angkatan }}</option>
                @endforeach
            </select>

            <input name="email" type="email" value="{{ $user->email }}" required class="p-2 border rounded">

            <div class="col-span-2">
                <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('mahasiswa.index') }}" class="ml-2 text-cyan-700">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
