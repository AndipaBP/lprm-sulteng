<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenis_mobil;
use App\Models\Merk_mobil;
use App\Models\Tipe_mobil;
use App\Models\Mobil;
use App\Models\Rental;
use App\Models\Video_rental;
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

            $daftar_mobil = Mobil::where('rental_id', $id)->paginate(12);

            $daftar_video = Video_rental::where('rental_id', $id)->first();

            $video = '';
    
            if($daftar_video){
    
                $link =  $daftar_video->link;
    
                if(preg_match('/youtube.com/', $link)){
                    $video = trim(substr($link, strpos($link, '=')+1));
                }
                else{
                    $video = trim(substr($link, strpos($link, '.be/')+4));
                }
    
            }

            return view('home/web/daftar_rental/detail', compact('rental','daftar_mobil','video'));

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
