<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'mobil' => Dashboard::totalMobil(),
            'siswa' => Dashboard::totalSiswa(),
            'jadwal' => Dashboard::totalJadwal(),
            'hari_ini' => Dashboard::jadwalHariIni()
        ]);
    }
}