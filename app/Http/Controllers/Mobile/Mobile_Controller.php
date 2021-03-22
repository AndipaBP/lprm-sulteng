<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipe;
use App\Models\Tipe_mobil;
use App\Models\Mobil;
use Alert;


class Mobile_Controller extends Controller
{
    //

    public function home(){

        return view('home/mobile/index');
    }
    
    public function mobil(){
        
        $tipe = Tipe_mobil::orderBy('nama','asc')->get();

        return view('home/mobile/mobil/index', compact('tipe'));
    }

    public function tipe_mobil($id){

        $tipe_mobil = Tipe_mobil::where('nama', $id)->first();

        if($tipe_mobil){

            $tipe_mobil_id = $tipe_mobil->id;

            $mobil = Mobil::where('tipe_mobil_id', $tipe_mobil_id)->get();
    
    
            // dd($mobil);
    
            return view('home/mobile/mobil/tipe_mobil', compact('tipe_mobil', 'mobil'));

        }
        else{

            Alert::info('Maaf', 'Tipe Mobil Belum Ada Mobil');
            return redirect()->back();
        }
    
    }

    public function detail_mobil($id, $no_plat){


        $tipe_mobil = Tipe_mobil::where('nama', $id)->first();

        $tipe_mobil_id = $tipe_mobil->id;

        $mobil = Mobil::where('tipe_mobil_id', $tipe_mobil_id)->where('no_plat', $no_plat)->first();

        // dd($mobil);

        return view('home/mobile/mobil/detail_mobil', compact('mobil'));
    }

}
