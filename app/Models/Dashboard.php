<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Dashboard
{
    public static function totalMobil()
    {
    return DB::table('mobils')->count();
    }

    public static function totalSiswa()
    {
        return DB::table('siswas')->count();
    }

    public static function totalJadwal()
    {
        return DB::table('jadwals')->count();
    }

    public static function jadwalHariIni()
    {
    return DB::table('jadwals')
        ->whereDate('tanggal', now())
        ->get();
    }
}