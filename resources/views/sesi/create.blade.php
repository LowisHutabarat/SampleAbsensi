<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white p-6 mt-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4 text-cyan-800">Buka atau Lewatkan Sesi Kuliah</h2>

        {{-- Form untuk Buka Sesi --}}
        <form method="POST" action="{{ route('sesi.store') }}" class="mb-4">
            @csrf
            <label for="kode_mata_kuliah" class="block mb-2">Pilih Mata Kuliah:</label>
            <select name="kode_mata_kuliah" id="kode_mata_kuliah" required class="mb-4 p-2 border w-full rounded">
                @foreach($mataKuliahs as $matkul)
                    <option value="{{ $matkul->kode }}">{{ $matkul->nama }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Buka Sesi
            </button>
        </form>

        {{-- Tombol Lewatkan Sesi --}}
        <a href="#"
   onclick="event.preventDefault();
     let kode = document.getElementById('kode_mata_kuliah').value;
     if (kode) {
         const form = document.createElement('form');
         form.method = 'POST';
         form.action = '{{ route('sesi.skip') }}';
         const token = document.createElement('input');
         token.name = '_token';
         token.value = '{{ csrf_token() }}';
         token.type = 'hidden';
         form.appendChild(token);

         const input = document.createElement('input');
         input.type = 'hidden';
         input.name = 'kode_mata_kuliah';
         input.value = kode;
         form.appendChild(input);

         document.body.appendChild(form);
         form.submit();
     } else {
         alert('Silakan pilih mata kuliah terlebih dahulu.');
     }"
   class="bg-yellow-500 text-white px-6 py-2 rounded shadow hover:bg-yellow-600 mt-2 inline-block">
   Lewatkan Sesi
</a>

    </div>
</x-app-layout>
