<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwalmobil extends Model
{
    protected $table = 'jadwals';

    protected $fillable = [
        'mobil_id',
        'siswa_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai'
    ];

    public function Mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}