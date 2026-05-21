<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('paket')->insert([

            // ================= MANUAL =================
            [
                'nama_paket' => 'Manual 2 Jam',
                'harga' => 250000,
                'deskripsi' => '2 jam pelatihan, 2 hari (1–2 jam/hari)',
                'jenis_mobil' => 'Manual'
            ],
            [
                'nama_paket' => 'Manual 4 Jam',
                'harga' => 400000,
                'deskripsi' => '4 jam pelatihan, 4 hari (1 jam/hari)',
                'jenis_mobil' => 'Manual'
            ],
            [
                'nama_paket' => 'Manual 5 Jam',
                'harga' => 500000,
                'deskripsi' => '5 jam pelatihan, 5 hari (1 jam/hari)',
                'jenis_mobil' => 'Manual'
            ],
            [
                'nama_paket' => 'Manual 10 Jam',
                'harga' => 900000,
                'deskripsi' => '10 jam pelatihan, 5 hari (2 jam/hari)',
                'jenis_mobil' => 'Manual'
            ],
            [
                'nama_paket' => 'Manual 5 Jam + SIM',
                'harga' => 1350000,
                'deskripsi' => '5 jam pelatihan + SIM',
                'jenis_mobil' => 'Manual'
            ],
            [
                'nama_paket' => 'Manual 10 Jam + SIM',
                'harga' => 1750000,
                'deskripsi' => '10 jam pelatihan + SIM',
                'jenis_mobil' => 'Manual'
            ],

            // ================= MATIC =================
            [
                'nama_paket' => 'Matic 2 Jam',
                'harga' => 300000,
                'deskripsi' => '2 jam pelatihan, 2 hari (1–2 jam/hari)',
                'jenis_mobil' => 'Matic'
            ],
            [
                'nama_paket' => 'Matic 4 Jam',
                'harga' => 500000,
                'deskripsi' => '4 jam pelatihan, 4 hari (1 jam/hari)',
                'jenis_mobil' => 'Matic'
            ],
            [
                'nama_paket' => 'Matic 5 Jam',
                'harga' => 600000,
                'deskripsi' => '5 jam pelatihan, 5 hari (1 jam/hari)',
                'jenis_mobil' => 'Matic'
            ],
            [
                'nama_paket' => 'Matic 10 Jam',
                'harga' => 950000,
                'deskripsi' => '10 jam pelatihan, 5 hari (2 jam/hari)',
                'jenis_mobil' => 'Matic'
            ],
            [
                'nama_paket' => 'Matic 5 Jam + SIM',
                'harga' => 1450000,
                'deskripsi' => '5 jam pelatihan + SIM',
                'jenis_mobil' => 'Matic'
            ],
            [
                'nama_paket' => 'Matic 10 Jam + SIM',
                'harga' => 1800000,
                'deskripsi' => '10 jam pelatihan + SIM',
                'jenis_mobil' => 'Matic'
            ],

            // ================= KOMBINASI =================
            [
                'nama_paket' => 'Kombinasi 4 Jam',
                'harga' => 500000,
                'deskripsi' => '3 jam Manual + 1 jam Matic (Pendaftaran 50rb)',
                'jenis_mobil' => 'Kombinasi'
            ],
            [
                'nama_paket' => 'Kombinasi 4 Jam + SIM',
                'harga' => 1350000,
                'deskripsi' => '3 jam Manual + 1 jam Matic + SIM (Pendaftaran 50rb)',
                'jenis_mobil' => 'Kombinasi'
            ],
            [
                'nama_paket' => 'Kombinasi 10 Jam',
                'harga' => 950000,
                'deskripsi' => '8 jam Manual + 2 jam Matic (Pendaftaran 50rb)',
                'jenis_mobil' => 'Kombinasi'
            ],
            [
                'nama_paket' => 'Kombinasi 10 Jam + SIM',
                'harga' => 1800000,
                'deskripsi' => '8 jam Manual + 2 jam Matic + SIM (Pendaftaran 50rb)',
                'jenis_mobil' => 'Kombinasi'
            ],

            // ================= MANDIRI =================
            [
                'nama_paket' => 'Mandiri 2 Jam',
                'harga' => 200000,
                'deskripsi' => '2 jam pelatihan, 1 hari (2 jam/hari)',
                'jenis_mobil' => 'Mandiri'
            ],
            [
                'nama_paket' => 'Mandiri 4 Jam',
                'harga' => 375000,
                'deskripsi' => '4 jam pelatihan, 2 hari (2 jam/hari)',
                'jenis_mobil' => 'Mandiri'
            ],
            [
                'nama_paket' => 'Mandiri 8 Jam',
                'harga' => 775000,
                'deskripsi' => '8 jam pelatihan, 4 hari (2 jam/hari)',
                'jenis_mobil' => 'Mandiri'
            ],

        ]);
    }
}