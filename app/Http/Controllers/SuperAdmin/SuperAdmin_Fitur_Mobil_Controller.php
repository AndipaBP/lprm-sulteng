<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fitur;
use Alert;

class SuperAdmin_Fitur_Mobil_Controller extends Controller
{
    //
    public function index(){

        $fitur = Fitur::all();
        
        return view('users/superadmin/spesifikasi-mobil/fitur/index', compact('fitur'));
    }

    public function simpan_fitur(Request $request){

        // dd($request->all());

        $this->validate($request,[
			'fitur_mobil' => 'required'
		]);

		$fitur = new Fitur;
        $fitur->nama = $request->fitur_mobil;
        $fitur->save();

        Alert::success('Berhasil', 'Fitur Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function hapus_fitur(Request $request){

        Fitur::where('id',$request->id_hapus)->delete();

        Alert::success('Berhasil', 'Fitur Berhasil Dihapus');

        return redirect()->back();
    }

}
