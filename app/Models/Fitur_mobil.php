<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitur_mobil extends Model
{
    use HasFactory;
    
    protected $table = "fitur_mobil";

    public function fitur(){

        return $this->belongsTo(Fitur::class);

    }

    public function mobil(){

        return $this->belongsTo(Mobil::class);

    }

}
