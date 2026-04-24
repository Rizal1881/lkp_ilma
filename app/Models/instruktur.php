<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instruktur extends Model
{
    protected $table = 'instrukturs';

    protected $fillable = ['nama','no_hp'];

    public function jadwal()
    {
        return $this->hasMany(Jadwalmobil::class);
    }
}