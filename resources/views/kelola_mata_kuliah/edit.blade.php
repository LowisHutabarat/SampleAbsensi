<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Edit Mata Kuliah</h2>

        <form action="{{ route('mata-kuliah.update', $matakuliah->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 text-gray-700">Kode</label>
                <input type="text" name="kode" value="{{ $matakuliah->kode }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Nama</label>
                <input type="text" name="nama" value="{{ $matakuliah->nama }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">SKS</label>
                <input type="number" name="sks" value="{{ $matakuliah->sks }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Dosen Pengampu</label>
                <select name="nomor_induk_dosen" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @foreach ($dosens as $dosen)
                        <option value="{{ $dosen->nomor_induk }}" @if($dosen->nomor_induk == $matakuliah->nomor_induk_dosen) selected @endif>
                            {{ $dosen->name }} ({{ $dosen->nomor_induk }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
