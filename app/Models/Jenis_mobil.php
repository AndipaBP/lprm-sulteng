<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_mobil extends Model
{
    use HasFactory;
    protected $table = "jenis_mobil";

    public function tipe_mobil(){

        return $this->hasMany(Tipe_mobil::class);
        
    }

}
