<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Daftar Sebagai')" />
            <select id="role" name="role" required class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Pilih Role</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
                <option value="pegawai">Pegawai</option>
                <option value="admin_akademik">Admin Akademik</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Nomor Induk (NPM/NIDN Dinamis) -->
        <div class="mt-4">
            <x-input-label for="nomor_induk" :value="__('Nomor Induk')" id="label_nomor_induk" />
            <x-text-input id="nomor_induk" class="block mt-1 w-full" type="text" name="nomor_induk" :value="old('nomor_induk')" required />
            <x-input-error :messages="$errors->get('nomor_induk')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Register Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Sudah Punya Akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- JavaScript Dinamis -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const roleSelect = document.getElementById('role');
        const labelInduk = document.getElementById('label_nomor_induk');

        function updateLabel() {
            const selected = roleSelect.value;
            if (selected === "mahasiswa") {
                labelInduk.textContent = "NPM";
            } else if (selected === "dosen") {
                labelInduk.textContent = "NIDN";
            } else if (selected === "pegawai") {
                labelInduk.textContent = "ID Pegawai";
            } else if (selected === "admin_akademik") {
                labelInduk.textContent = "NIDN";
            } else {
                labelInduk.textContent = "Nomor Induk";
            }
        }

        roleSelect.addEventListener("change", updateLabel);
        updateLabel(); // Jalankan saat awal load
    });
</script>

</x-guest-layout>
