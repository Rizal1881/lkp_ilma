<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    public function index()
    {
        $data = siswa::all();
        return view('siswa.index', compact('data'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        siswa::create($request->all());
        return redirect('/siswa');
    }

    public function delete($id)
    {
        siswa::destroy($id);
        return redirect('/siswa');
    }
}