<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Session;
use App\Models\User;
use Alert;


class Akun_Controller extends Controller
{
    //
    public function index(){


        $user = User::find(Session::get('users_id'));

        return view('/users/pengaturan_akun', compact('user'));
    }

    public function simpan_data_akun(Request $request){

        $user = User::find(Session::get('users_id'));
            
        if($request->get('username')){

            $user->username = $request->username;
            Session::put('username', $request->username);
        }

        if($request->get('email')){

            $user->email = $request->email;
        }

        if($request->get('password')){

            $user->username = bcrypt($request->password);
        }

        $user->save();

        Alert::success('Berhasil', 'Akun Berhasil Diperbarui');

        return redirect()->back();
    }
}
