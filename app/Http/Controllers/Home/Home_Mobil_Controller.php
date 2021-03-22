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

class Home_Mobil_Controller extends Controller
{
    //
    public function daftar_mobil(){

        $jenis = Jenis_mobil::all();
        $merk = Merk_mobil::all();

        // dd($merk);

		return view('home/web/daftar_mobil/index', compact('jenis','merk'));
    }

    public function jenis_daftar_mobil($jenis, $id){

        if($jenis == 'jenis-mobil'){

            $jenis = Jenis_mobil::where('nama', $id)->first();
            
            $tipe = Tipe_mobil::where('jenis_mobil_id', $jenis->id)->get();

            return view('home/web/daftar_mobil/jenis', compact('jenis','tipe'));
        }
        elseif($jenis == 'merk-mobil'){

            $merk = Merk_mobil::where('nama', $id)->first();
            
            $tipe = Tipe_mobil::where('merk_mobil_id', $merk->id)->get();

            return view('home/web/daftar_mobil/merk', compact('merk','tipe'));
        }
    }

    public function detail_jenis_daftar_mobil($jenis, $id, $no_plat){

        if($jenis == 'jenis-mobil'){

            $jenis = Jenis_mobil::where('nama', $id)->first();
            $tipe = Tipe_mobil::where('jenis_mobil_id', $jenis->id)->first();
            $mobil = Mobil::where('tipe_mobil_id', $tipe->id)->where('no_plat', $no_plat)->first();

            return view('home/web/daftar_mobil/detail_jenis', compact('jenis','tipe','mobil'));
        }
        elseif($jenis == 'merk-mobil'){

            $merk = Merk_mobil::where('nama', $id)->first();            
            $tipe = Tipe_mobil::where('merk_mobil_id', $merk->id)->first();
            $mobil = Mobil::where('tipe_mobil_id', $tipe->id)->where('no_plat', $no_plat)->first();


            return view('home/web/daftar_mobil/detail_merk', compact('merk','tipe', 'mobil'));
        }

    }
}
