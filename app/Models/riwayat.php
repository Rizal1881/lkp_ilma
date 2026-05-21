<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $fillable = [
        'nama',
        'paket',
        'jenis_mobil',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'payment_status',
        'order_id'
    ];
}