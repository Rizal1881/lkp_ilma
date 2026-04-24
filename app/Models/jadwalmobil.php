<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwalmobil extends Model
{
    protected $table = 'Jadwals';

    protected $fillable = [
        'mobil_id',
        'instruktur_id',
        'siswa_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai'
    ];

    public function Mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function Instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}