<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;

class mobilController extends Controller
{
    public function index()
    {
        $data = mobil::all();
        return view('mobil.index', compact('data'));
    }

    public function create()
    {
        return view('mobil.create');
    }

    public function store(Request $request)
    {
        mobil::create($request->all());
        return redirect('/mobil');
    }

    public function delete($id)
    {
        mobil::destroy($id);
        return redirect('/mobil');
    }
}