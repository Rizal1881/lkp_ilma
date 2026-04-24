<?php

namespace App\Http\Controllers;

use App\Models\dashboard;

class dasboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'mobil' => dashboard::totalMobil(),
            'instruktur' => dashboard::totalInstruktur(),
            'siswa' => dashboard::totalSiswa(),
            'jadwal' => dashboard::totalJadwal(),
            'hari_ini' => dashboard::jadwalHariIni()
        ]);
    }
}