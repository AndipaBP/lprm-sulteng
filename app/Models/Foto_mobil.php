<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_mobil extends Model
{
    use HasFactory;

    protected $table = "foto_mobil";

    public function mobil(){

        return $this->belongsTo(Mobil::class);

    }
}
