<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe_mobil extends Model
{
    use HasFactory;
    protected $table = "tipe_mobil";

    public function merk_mobil()
    {
        return $this->belongsTo(Merk_mobil::class);
    }

    public function jenis_mobil()
    {
        return $this->belongsTo(Jenis_mobil::class);
    }


    public function mobil()
    {
        return $this->hasMany(Mobil::class); 
    }

}
