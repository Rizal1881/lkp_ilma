<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('paket.index', compact('paket'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        Paket::create([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/paket')->with('success', 'Data berhasil ditambahkan');
    }
}