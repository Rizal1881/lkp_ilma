<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mobil;

class MobilSeeder extends Seeder
{
    public function run()
    {
        // Manual = 3
        Mobil::updateOrCreate(
            ['jenis' => 'Manual'],
            [
                'jumlah' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // Matic = 1
        Mobil::updateOrCreate(
            ['jenis' => 'Matic'],
            [
                'jumlah' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}