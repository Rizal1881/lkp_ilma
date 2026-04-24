<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = ['nama','no_hp'];

    public function Jadwal()
    {
        return $this->hasMany(Jadwalmobil::class);
    }
}