<?php

namespace App\Http\Controllers\Rental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Tipe_mobil;
use Session;

class Rental_Controller extends Controller
{
    //
    public function index(){

        // $tipe = Tipe_mobil::orderBy('nama','asc')->get();

        $mobil = Mobil::orderBy('tipe_mobil_id', 'asc')->where('rental_id', Session::get('rental_id'))->get();

        return view('users/rental/dashboard', compact('mobil'));
    }
}
