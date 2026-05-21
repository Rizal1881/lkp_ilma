<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\mobilController;
use App\Http\Controllers\jadwalmobilController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MidtransCallbackController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home', [DashboardController::class,'index'])->middleware('auth');


Route::get('/sertifikat', function () {
    return view('sertifikat');
});
/*
|--------------------------------------------------------------------------
| MASTER DATA
|--------------------------------------------------------------------------
*/

// MOBIL
Route::get('/mobil', [mobilController::class,'index']);
Route::get('/mobil/create', [mobilController::class,'create']);
Route::post('/mobil/store', [mobilController::class,'store']);
Route::get('/mobil/delete/{id}', [mobilController::class,'delete']);

// SISWA
Route::get('/siswa', [siswaController::class,'index']);
Route::get('/siswa/create', [siswaController::class,'create']);
Route::post('/siswa/store', [siswaController::class,'store']);
Route::get('/siswa/delete/{id}', [siswaController::class,'delete']);

// PAKET
Route::get('/paket', [PaketController::class, 'index']);
Route::get('/paket/create', [PaketController::class, 'create']);
Route::post('/paket/store', [PaketController::class, 'store']);

// JADWAL
Route::get('/jadwal', [jadwalmobilController::class,'index']);
Route::get('/jadwal/create', [jadwalmobilController::class,'create']);
Route::post('/jadwal/store', [jadwalmobilController::class,'store']);
Route::get('/jadwal/delete/{id}', [jadwalmobilController::class,'delete']);

Route::get('/riwayat', [RiwayatController::class, 'index']);
Route::post('/batal/{id}', [PendaftaranController::class, 'batal']);

Route::view('/layanan', 'layanan');
Route::view('/informasi', 'informasi');
Route::view('/testimoni', 'testimoni');
Route::view('/fasilitas', 'fasilitas');
Route::view('/informasi', 'tentang');
Route::view('/materi', 'materi');
Route::view('/jam-operasional', 'jam');
Route::view('/visi-misi', 'visi');
Route::view('/sertifikat', 'sertifikat');
Route::view('/lokasi', 'lokasi');
Route::view('/kontak', 'kontak');
/*
|--------------------------------------------------------------------------
| 🔥 MIDTRANS CALLBACK (WAJIB DI LUAR AUTH)
|--------------------------------------------------------------------------
*/

Route::post('/midtrans/callback', [MidtransCallbackController::class, 'handle']);


/*
|--------------------------------------------------------------------------
| 🔥 PENDAFTARAN + PEMBAYARAN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth'])->group(function () {

    // FORM PENDAFTARAN
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');

    // CEK KETERSEDIAAN (AJAX)
    Route::get('/cek-ketersediaan', [PendaftaranController::class, 'cekKetersediaan']);

    // 🔥 SIMPAN + BUAT SNAP TOKEN
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    // 🔥 OPTIONAL (kalau mau halaman selesai bayar)
    Route::get('/pembayaran/sukses', function () {
        return view('pembayaran.sukses');
    });

    Route::get('/pembayaran/pending', function () {
        return view('pembayaran.pending');
    });

    Route::get('/pembayaran/gagal', function () {
        return view('pembayaran.gagal');
    });

});
require __DIR__.'/auth.php';