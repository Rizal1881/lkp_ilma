<?php

namespace App\Http\Controllers;

use App\Models\Jadwalmobil;
use App\Models\Mobil;
use App\Models\Instruktur;
use App\Models\Siswa;
use Illuminate\Http\Request;

class jadwalmobilController extends Controller
{
    public function index()
    {
        $data = jadwalmobil::with('Mobil','Instruktur','Siswa')->get();
        return view('Jadwal.index', compact('data'));
    }

    public function create()
    {
        return view('Jadwal.create', [
            'Mobil' => Mobil::all(),
            'Instruktur' => Instruktur::all(),
            'Siswa' => Siswa::all()
        ]);
    }

    public function store(Request $request)
    {
        // CEK BENTROK 🔥
        $cek = Jadwalmobil::where('mobil_id',$request->mobil_id)
            ->where('tanggal',$request->tanggal)
            ->where(function($q) use ($request){
                $q->whereBetween('jam_mulai',[$request->jam_mulai,$request->jam_selesai])
                  ->orWhereBetween('jam_selesai',[$request->jam_mulai,$request->jam_selesai]);
            })->exists();

        if($cek){
            return back()->with('error','Mobil sudah dipakai di jam ini!');
        }

        jadwalmobil::create($request->all());

        mobil::where('id',$request->mobil_id)
            ->update(['status'=>'dipakai']);

        return redirect('/jadwal');
    }

    public function delete($id)
    {
        jadwalmobil::destroy($id);
        return redirect('/jadwal');
    }
}