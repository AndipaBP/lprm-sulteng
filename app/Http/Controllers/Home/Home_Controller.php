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

class Home_Controller extends Controller
{
    //
    public function index(){


        $tipe = Tipe_mobil::orderBy('nama', 'asc')->get();
        $rental = Rental::all();
        $mobil = Mobil::all();

		return view('home/web/index', compact('tipe','rental','mobil'));
    }

    public function tipe_mobil($id){

        $tipe_mobil = Tipe_mobil::where('nama', $id)->first();

        if($tipe_mobil){

            $tipe_mobil_id = $tipe_mobil->id;

            $mobil = Mobil::where('tipe_mobil_id', $tipe_mobil_id)->get();
                
            return view('home/web/tipe_mobil/index', compact('tipe_mobil', 'mobil'));

        }
        else{

            Alert::info('Maaf', 'Tipe Mobil Belum Ada');
            return redirect()->back();
        }
    }

    public function tipe_mobil_detail_mobil($id, $no_plat){

        $tipe_mobil = Tipe_mobil::where('nama', $id)->first();


        $tipe_mobil_id = $tipe_mobil->id;

        $mobil = Mobil::where('tipe_mobil_id', $tipe_mobil_id)->where('no_plat', $no_plat)->first();

        // dd($mobil);

        return view('home/web/tipe_mobil/detail', compact('mobil','tipe_mobil'));
    }

   
}
