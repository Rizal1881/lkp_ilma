<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
        protected $fillable = [
            'nama',
            'email',
            'no_hp',
            'alamat',
            'paket',
            'jenis_mobil',
            'jadwal',
            'order_id',
            'snap_token',
            'payment_status'
        ];
}