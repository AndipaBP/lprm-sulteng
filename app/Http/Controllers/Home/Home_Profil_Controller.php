<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Home_Profil_Controller extends Controller
{
    //

    public function tentang_kami(){


        return view('home/web/profil/tentang_kami');
    }
}
