<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenis_mobil;
use App\Models\Merk_mobil;
use App\Models\Tipe_mobil;
use App\Models\Mobil;
use App\Models\Rental;
use Alert;

class Home_Rental_Controller extends Controller
{
    //
    public function daftar_rental(){

        $rental = Rental::orderBy('nama', 'asc')->paginate(16);

		return view('home/web/daftar_rental/index', compact('rental'));

    }

    public function detail_rental($id){

        $rental = Rental::where('id',$id)->first();

        if($rental){

            $mobil = Mobil::where('rental_id', $id)->paginate(12);

            return view('home/web/daftar_rental/detail', compact('rental','mobil'));

        }
        else{
            return redirect()->back();
        }

    }

    public function mobil_detail_rental($id, $no_plat){

        $mobil = Mobil::where('rental_id', $id)->where('no_plat', $no_plat)->first();

        return view('home/web/daftar_rental/detail_mobil', compact('mobil'));

    }
}
