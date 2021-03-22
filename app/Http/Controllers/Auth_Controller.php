<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Session;
// Model
use App\Models\User;
use Alert;


class Auth_Controller extends Controller
{
    //

    public function login(){
        return view('auth/login');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function post_login(Request $request){

        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        // dd($request->all());

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){

            $user = User::where('username', $request->username)->first();

            // dd($user->id);
            Session::put('level_akses', $user->level_akses);
            Session::put('users_id', $user->id);
            Session::put('username', $user->username);

            // dd($user->level_akses);
            if($user->level_akses == 'Superadmin'){

                return redirect('/superadmin');
            }
            elseif($user->level_akses == 'Rental'){

                Session::put('rental_id', $user->rental->id);
                Session::put('nama_rental', $user->rental->nama);

                return redirect('/rental');
            }
        }
        
        $notification = array(
            'message' => 'Maaf Username & Password Salah'
         );     

        return redirect()->back()->with($notification);

    }

    public function ganti_password(Request $request){
        
        $validation = \Validator::make($request->all(),[
            'ganti_pass' => 'required|min:8',
            'ganti_pass_confirm' => 'required|same:ganti_pass'
        ])->validate();    

        $user = User::find(Session::get('users_id'));
        $user->password = bcrypt($request->get('ganti_pass'));
        $user->save();

        Alert::success('Berhasil', 'Password Berhasil Diubah');

        return redirect()->back();
    }

}
