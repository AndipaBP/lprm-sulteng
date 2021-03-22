<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Mobil;

class SuperAdmin_Controller extends Controller
{
    //

    public function dashboard(){

        $rental = Rental::all();
        $mobil = Mobil::all();

        return view('users/superadmin/dashboard', compact('rental','mobil'));
    }
}
