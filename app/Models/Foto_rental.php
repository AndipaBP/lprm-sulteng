<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_rental extends Model
{
    use HasFactory;
    protected $table = "foto_rental";

    public function rental(){

        return $this->belongsTo(Rental::class);

    }
}
