<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Edit Dosen</h2>

        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 text-gray-700">Nomor Induk</label>
                <input type="text" name="nomor_induk" value="{{ $dosen->nomor_induk }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $dosen->email }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Nama</label>
                <input type="text" name="name" value="{{ $dosen->name }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Password (opsional)</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengganti password.</small>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
