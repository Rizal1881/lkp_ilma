<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    protected $table = 'Mobils';

    protected $fillable = [
        'jenis',
        'jumlah'
    ];
    public function Jadwal()
    {
        return $this->hasMany(jadwalmobil::class);
    }
}