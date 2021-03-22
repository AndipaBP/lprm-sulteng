<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitur extends Model
{
    use HasFactory;

    protected $table = "fitur";

    public function fitur_mobil(){

        return $this->hasMany(Fitur_mobil::class);

    }

}
