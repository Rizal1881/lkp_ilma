<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Paket;
use App\Models\jadwalmobil;
use App\Models\Mobil;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Riwayat;

class PendaftaranController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('pendaftaran', compact('paket'));
    }

    // 🔥 CEK KETERSEDIAAN
    public function cekKetersediaan(Request $request)
    {
        $jam = $request->jam;
        $tanggal = now()->toDateString();

        $manualTotal = Mobil::where('jenis', 'Manual')->count();
        $maticTotal  = Mobil::where('jenis', 'Matic')->count();

        $manualTerpakai = jadwalmobil::where('tanggal', $tanggal)
            ->where('jenis_mobil', 'Manual')
            ->where('jam_mulai', '<=', $jam)
            ->where('jam_selesai', '>=', $jam)
            ->count();

        $maticTerpakai = jadwalmobil::where('tanggal', $tanggal)
            ->where('jenis_mobil', 'Matic')
            ->where('jam_mulai', '<=', $jam)
            ->where('jam_selesai', '>=', $jam)
            ->count();

        return response()->json([
            'manual' => ($manualTotal - $manualTerpakai) > 0 ? "Tersedia" : "Kosong",
            'matic'  => ($maticTotal - $maticTerpakai) > 0 ? "Tersedia" : "Kosong",
        ]);
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'no_hp' => 'required',
                'alamat' => 'required',
                'paket' => 'required',
                'jenis_mobil' => 'required',
                'jam' => 'required',
            ]);

            $tanggal = now()->toDateString();
            $jamMulai = $request->jam;
            $jamSelesai = date('H:i:s', strtotime($jamMulai . ' +2 hours'));
            $jenis = $request->jenis_mobil;

            // ================= VALIDASI MOBIL =================
            if ($jenis != 'Mandiri') {

                if ($jenis == 'Kombinasi') {

                    $manualTotal = Mobil::where('jenis', 'Manual')->count();
                    $maticTotal  = Mobil::where('jenis', 'Matic')->count();

                    $manualTerpakai = jadwalmobil::where('tanggal', $tanggal)
                        ->where('jenis_mobil', 'Manual')
                        ->where('jam_mulai', '<', $jamSelesai)
                        ->where('jam_selesai', '>', $jamMulai)
                        ->count();

                    $maticTerpakai = jadwalmobil::where('tanggal', $tanggal)
                        ->where('jenis_mobil', 'Matic')
                        ->where('jam_mulai', '<', $jamSelesai)
                        ->where('jam_selesai', '>', $jamMulai)
                        ->count();

                    if ($manualTerpakai >= $manualTotal || $maticTerpakai >= $maticTotal) {
                        return response()->json(['error' => 'Mobil kombinasi tidak tersedia'], 400);
                    }

                } else {

                    $totalMobil = Mobil::where('jenis', $jenis)->count();

                    $terpakai = jadwalmobil::where('tanggal', $tanggal)
                        ->where('jenis_mobil', $jenis)
                        ->where('jam_mulai', '<', $jamSelesai)
                        ->where('jam_selesai', '>', $jamMulai)
                        ->count();

                    if ($terpakai >= $totalMobil) {
                        return response()->json(['error' => 'Mobil habis'], 400);
                    }
                }
            }

            // ================= MIDTRANS =================
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $order_id = 'ORDER-' . time();

            $paket = Paket::where('nama_paket', $request->paket)->first();
            $harga = $paket ? $paket->harga : 100000;

            $params = [
                'transaction_details' => [
                    'order_id' => $order_id,
                    'gross_amount' => $harga,
                ],
                'customer_details' => [
                    'first_name' => $request->nama,
                    'email' => $request->email,
                    'phone' => $request->no_hp,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            // ================= SIMPAN PENDAFTARAN =================
            Pendaftaran::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'paket' => $request->paket,
                'jenis_mobil' => $request->jenis_mobil,
                'jadwal' => $request->jam,
                'jam_selesai' => $jamSelesai,
                'order_id' => $order_id,
                'snap_token' => $snapToken,
                'payment_status' => 'pending'
            ]);

            // ================= SIMPAN JADWAL =================
            jadwalmobil::create([
                'jenis_mobil' => $request->jenis_mobil,
                'tanggal' => $tanggal,
                'jam_mulai' => $jamMulai,
                'jam_selesai' => $jamSelesai,
            ]);

            // ================= SIMPAN RIWAYAT =================
            Riwayat::create([
                'nama' => $request->nama,
                'paket' => $request->paket,
                'jenis_mobil' => $request->jenis_mobil,
                'tanggal' => $tanggal,
                'jadwal' => $jamMulai,
                'jam_mulai' => $jamMulai,
                'jam_selesai' => $jamSelesai,
                'payment_status' => 'pending',
                'order_id' => $order_id
            ]);

            return response()->json([
                'snap_token' => $snapToken
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // ================= 🔥 FITUR PEMBATALAN =================
    public function batal($id)
    {
        $riwayat = Riwayat::findOrFail($id);

        // 🔥 CEK: kalau sudah bayar tidak boleh batal
    if ($riwayat->payment_status == 'paid') {
        return redirect('/riwayat')->with('error', 'Tidak bisa dibatalkan, sudah dibayar');
    }

        // 🔥 HAPUS JADWAL (BIAR SLOT BALIK)
        jadwalmobil::where('tanggal', $riwayat->tanggal)
            ->where('jam_mulai', $riwayat->jam_mulai)
            ->where('jam_selesai', $riwayat->jam_selesai)
            ->where('jenis_mobil', $riwayat->jenis_mobil)
            ->delete();

        // 🔥 UPDATE STATUS RIWAYAT
        $riwayat->update([
            'payment_status' => 'batal'
        ]);

        return redirect('/riwayat')->with('success', 'Pendaftaran berhasil dibatalkan');
    }
}