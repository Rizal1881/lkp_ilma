<?php

namespace App\Http\Controllers;

use App\Models\instruktur;
use Illuminate\Http\Request;

class instrukturController extends Controller
{
    public function index()
    {
        $data = instruktur::all();
        return view('instruktur.index', compact('data'));
    }

    public function store(Request $request)
    {
        instruktur::create($request->all());
        return redirect('/pelatih');
    }
}