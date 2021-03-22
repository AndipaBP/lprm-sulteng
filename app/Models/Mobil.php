<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $table = "mobil";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function tipe_mobil()
    {

        return $this->belongsTo(Tipe_mobil::class);
    }

    public function fitur_mobil()
    {
        
        return $this->hasMany(Fitur_mobil::class);

    }

    public function foto_mobil()
    {
        return $this->hasMany(Foto_mobil::class);
    }


}
