<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// IMPORT SEMUA MODEL 🔥
use App\Models\mobil;
use App\Models\instruktur;
use App\Models\siswa;
use App\Models\jadwalmobil;

class dashboard extends Model
{
    public static function totalMobil()
    {
        return mobil::count();
    }

    public static function totalInstruktur()
    {
        return instruktur::count();
    }

    public static function totalSiswa()
    {
        return siswa::count();
    }

    public static function totalJadwal()
    {
        return jadwalmobil::count();
    }

    public static function jadwalHariIni()
    {
        return jadwalmobil::whereDate('tanggal', date('Y-m-d'))->count();
    }
}