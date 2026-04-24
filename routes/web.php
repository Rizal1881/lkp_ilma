<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dasboardController;
use App\Http\Controllers\mobilController;
use App\Http\Controllers\jadwalmobilController;
use App\Http\Controllers\instrukturController;
use App\Http\Controllers\siswaController;

Route::get('/', function () {
    return view('dasboard');

Route::get('/', [dasboardController::class,'index']);

// MOBIL
Route::get('/mobil', [mobilController::class,'index']);
Route::get('/mobil/create', [mobilController::class,'create']);
Route::post('/mobil/store', [mobilController::class,'store']);
Route::get('/mobil/delete/{id}', [mobilController::class,'delete']);

//INSTRUKTUR
Route::get('/instruktur', [instrukturController::class, 'index']);
Route::get('/instruktur/create', [instrukturController::class, 'create']);
Route::post('/instruktur/store', [instrukturController::class, 'store']);
Route::get('/instruktur/delete/{id}', [instrukturController::class, 'destroy']);

// SISWA
Route::get('/siswa', [siswaController::class,'index']);
Route::get('/siswa/create', [siswaController::class,'create']);
Route::post('/siswa/store', [siswaController::class,'store']);
Route::get('/siswa/delete/{id}', [siswaController::class,'delete']);

// JADWAL
Route::get('/jadwal', [jadwalmobilController::class,'index']);
Route::get('/jadwal/create', [jadwalmobilController::class,'create']);
Route::post('/jadwal/store', [jadwalmobilController::class,'store']);
Route::get('/jadwal/delete/{id}', [jadwalmobilController::class,'delete']);

});