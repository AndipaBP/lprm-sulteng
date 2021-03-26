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

        $berita = Berita::orderBy('created_at', 'desc')->paginate(12);

        return view('home/web/berita/index', compact('berita'));
    }

    public function detail_berita($slug){

        $berita = Berita::where('slug',$slug)->first();

        $berita_lainnya = Berita::orderBy('created_at', 'desc')->get();
        // dd($berita);

        return view('home/web/berita/detail', compact('berita','berita_lainnya'));
    }
}
