<?php

namespace App\Http\Controllers;

use App\Models\jadwalmobil;
use App\Models\Mobil;
use App\Models\Siswa;
use Illuminate\Http\Request;

class jadwalmobilController extends Controller
{
    public function index()
    {
        $data = jadwalmobil::with('Mobil','Siswa')->get();
        return view('Jadwal.index', compact('data'));
    }

    public function create()
    {
        return view('Jadwal.create', [
            'Mobil' => Mobil::all(),
            'Siswa' => Siswa::all()
        ]);
    }

    public function store(Request $request)
    {
        // 🔥 VALIDASI TAMBAHAN
        $request->validate([
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'jenis_mobil' => 'required' // 🔥 TAMBAHAN
        ]);

        // 🔥 CEK BENTROK BERDASARKAN JENIS MOBIL (STOK)
        $bentrokCount = jadwalmobil::where('tanggal', $request->tanggal)
            ->where('jenis_mobil', $request->jenis_mobil)
            ->where(function($q) use ($request){
                $q->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                  ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai]);
            })->count();

        // 🔥 AMBIL TOTAL MOBIL DARI TABEL MOBIL
        $totalMobil = Mobil::where('jenis', $request->jenis_mobil)->value('jumlah') ?? 0;

        // 🔥 CEK HABIS / TIDAK
        if($bentrokCount >= $totalMobil){
            return back()->with('error','Mobil '.$request->jenis_mobil.' sudah habis di jam ini!');
        }

        // ✅ SIMPAN DATA (TAMBAH JENIS_MOBIL)
        jadwalmobil::create([
                'nama' => $request->nama,
                'paket' => $request->paket,
                'jenis_mobil' => $request->jenis_mobil,
                'tanggal' => $tanggal,
                'jam_mulai' => $jamMulai,
                'jam_selesai' => $jamSelesai,
            ]);

        // 🔥 OPTIONAL: update status mobil (kalau masih dipakai sistem lama)
        if($request->mobil_id){
            Mobil::where('id',$request->mobil_id)
                ->update(['status'=>'dipakai']);
        }

        return redirect('/jadwal')->with('success','Jadwal berhasil ditambahkan!');
    }

    public function delete($id)
    {
        jadwalmobil::destroy($id);
        return redirect('/jadwal')->with('success','Data berhasil dihapus!');
    }
}