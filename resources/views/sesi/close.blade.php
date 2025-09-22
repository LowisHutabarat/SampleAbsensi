<x-app-layout>
    <div class="max-w-xl mx-auto bg-white p-6 mt-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Tutup Sesi Kuliah</h2>
        <form method="POST" action="{{ route('sesi.close', $sesi->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mb-2">Berita Acara:</label>
            <textarea name="berita_acara" required class="w-full p-2 border rounded mb-4"></textarea>

            <label class="block mb-2">Dokumentasi (Gambar):</label>
            <input type="file" name="dokumentasi" accept="image/*" required class="mb-4">

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Tutup dan Simpan
            </button>
        </form>
    </div>
</x-app-layout>
