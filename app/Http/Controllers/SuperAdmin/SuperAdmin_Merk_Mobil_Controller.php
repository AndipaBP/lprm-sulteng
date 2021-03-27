<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merk_mobil;
use Alert;

class SuperAdmin_Merk_Mobil_Controller extends Controller
{
    //

    public function index(){


        $merk = Merk_mobil::all();
        
        return view('users/superadmin/spesifikasi-mobil/merk/index', compact('merk'));
    }

    public function simpan_merk(Request $request){

        // dd($request->all());

        $this->validate($request,[
			'merk_mobil' => 'required',
			'file_upload' => 'required'
		]);

		$merk = new Merk_mobil;
        $merk->nama = $request->merk_mobil;
        $file = $request->file('file_upload');
        $filename = $request->merk_mobil.".".\File::extension($file->getClientOriginalName());
        $merk->foto  = $filename;
        \Storage::disk('public')->put('images/merk_mobil/'.$filename, file_get_contents($file));

        $merk->save();


        Alert::success('Berhasil', 'Merk Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function hapus_merk(Request $request){

        // dd($request->all());

        $merk = Merk_mobil::where('id', $request->id_hapus)->first();
        \Storage::disk('public')->delete('images/merk_mobil/'.$merk->foto);
        Merk_mobil::find($request->id_hapus)->delete();
        Alert::success('Berhasil', 'Merk Berhasil Dihapus');
        return redirect()->back();

    }
}
