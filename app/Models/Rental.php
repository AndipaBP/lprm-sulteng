<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = "rental";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function mobil(){
        return $this->hasMany(Mobil::class);
    }

    public function foto_rental(){
        return $this->hasMany(Foto_rental::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class);
    }
}
