<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanAbsensiController;
use App\Http\Controllers\KelolaMahasiswaController;
use App\Http\Controllers\KelolaMataKuliahController;
use App\Http\Controllers\KelolaDosenController;
use App\Http\Controllers\{
    ProfileController,
    SesiKuliahController,
    AbsensiController,
    RosterRegulerController,
    JadwalRegulerController,
    PenggantiSesiController,
    RegisteredUserController // ← kamu pakai tapi belum di-import
};

// Register
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/absensi/{sesi}', [AbsensiController::class, 'form']);
});

// Dosen
Route::middleware(['auth'])->group(function () {
    Route::get('/sesi/create', [SesiKuliahController::class, 'create'])->name('sesi.create');
    Route::post('/sesi/store', [SesiKuliahController::class, 'store'])->name('sesi.store');
    Route::post('/sesi/skip', [SesiKuliahController::class, 'skipStore'])->name('sesi.skip');
    Route::get('/sesi/{id}', [SesiKuliahController::class, 'show'])->name('sesi.show');
    Route::get('/sesi/{id}/close', [SesiKuliahController::class, 'closeForm'])->name('sesi.close.form');
    Route::put('/sesi/{id}/close', [SesiKuliahController::class, 'close'])->name('sesi.close');
    Route::get('/scan/{kode}', [AbsensiController::class, 'scan'])->name('absensi.scan');
});


Route::middleware(['auth', 'role:admin_akademik'])->group(function () {
    Route::get('/dosen', [KelolaDosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [KelolaDosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [KelolaDosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/{id}/edit', [KelolaDosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{id}', [KelolaDosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/{id}', [KelolaDosenController::class, 'destroy'])->name('dosen.destroy');
});


Route::middleware(['auth', 'role:admin_akademik'])->prefix('mata-kuliah')->group(function () {
    Route::get('/', [KelolaMataKuliahController::class, 'index'])->name('mata-kuliah.index');
    Route::get('/create', [KelolaMataKuliahController::class, 'create'])->name('mata-kuliah.create');
    Route::post('/', [KelolaMataKuliahController::class, 'store'])->name('mata-kuliah.store');
    Route::get('/{id}/edit', [KelolaMataKuliahController::class, 'edit'])->name('mata-kuliah.edit');
    Route::put('/{id}', [KelolaMataKuliahController::class, 'update'])->name('mata-kuliah.update');
    Route::delete('/{id}', [KelolaMataKuliahController::class, 'destroy'])->name('mata-kuliah.destroy');
});


// Sesi (resource)
Route::resource('sesi', SesiKuliahController::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {

    Route::get('/riwayat-absensi', function () {
        $user = Auth::user();
        if (!in_array($user->role, ['dosen', 'admin_akademik'])) {
            abort(403, 'Unauthorized.');
        }

        return app(LaporanAbsensiController::class)->index();
    })->name('laporan.absensi');

    Route::get('/laporan-absensi/pdf', function () {
        $user = Auth::user();
        if (!in_array($user->role, ['dosen', 'admin_akademik'])) {
            abort(403, 'Unauthorized.');
        }

        return app(LaporanAbsensiController::class)->cetakPDF();
    })->name('laporan.absensi.pdf');

});

// Pengganti (Dosen)
Route::middleware(['auth'])->group(function () {
    Route::get('/pengganti', [PenggantiSesiController::class, 'index'])->name('pengganti.index');
    Route::get('/pengganti/create', [PenggantiSesiController::class, 'create'])->name('pengganti.create');
    Route::post('/pengganti', [PenggantiSesiController::class, 'store'])->name('pengganti.store');
    Route::patch('/pengganti/{id}/approve', [PenggantiSesiController::class, 'approve'])->name('pengganti.approve');
    Route::patch('/pengganti/{id}/reject', [PenggantiSesiController::class, 'reject'])->name('pengganti.reject');
});

// Pengganti (Admin Akademik)
Route::middleware(['auth', 'role:admin_akademik'])->group(function () {
    Route::get('/pengganti/admin', [PenggantiSesiController::class, 'adminIndex'])->name('pengganti.admin.index');
});

Route::middleware(['auth'])->get('/jadwal-reguler-dosen', function () {
    $user = Auth::user();
    if (!in_array($user->role, ['dosen', 'admin_akademik'])) {
        abort(403, 'Unauthorized.');
    }

    return app(App\Http\Controllers\JadwalRegulerController::class)->index();
})->name('jadwal.dosen');


// Dashboard dengan tampilan Roster Reguler
Route::middleware(['auth'])->get('/dashboard', [RosterRegulerController::class, 'index'])->name('dashboard');

// Aksi CRUD hanya untuk admin akademik
Route::middleware(['auth', 'role:admin_akademik'])->group(function () {
    Route::post('/roster-reguler', [RosterRegulerController::class, 'store'])->name('roster.store');
    Route::get('/roster-reguler/{id}/edit', [RosterRegulerController::class, 'edit'])->name('roster.edit');
    Route::put('/roster-reguler/{id}', [RosterRegulerController::class, 'update'])->name('roster.update');
    Route::delete('/roster-reguler/{id}', [RosterRegulerController::class, 'destroy'])->name('roster.destroy');
});

Route::resource('mahasiswa', KelolaMahasiswaController::class);


// Dashboard & Welcome
Route::get('/', fn () => view('welcome'));

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
