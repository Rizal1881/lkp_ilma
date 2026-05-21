<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::latest()->get();

        return view('riwayat', compact('riwayat'));
    }
}