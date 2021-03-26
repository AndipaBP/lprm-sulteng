<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Alert;

class Home_Berita_Controller extends Controller
{
    //
    public function index(){


    }

    public function detail_berita($slug){

        $berita = Berita::where('slug',$slug)->first();

        dd($berita);

        return view('home/web/berita/detail', compact('berita'));
    }
}
