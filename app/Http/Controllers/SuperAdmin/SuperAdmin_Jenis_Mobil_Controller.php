<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenis_mobil;
use Alert;


class SuperAdmin_Jenis_Mobil_Controller extends Controller
{
    //


    public function index(){

        $jenis = Jenis_mobil::all();
        
        return view('users/superadmin/spesifikasi-mobil/jenis/index', compact('jenis'));
    }

    public function simpan_jenis(Request $request){

        // dd($request->all());

        $this->validate($request,[
			'jenis_mobil' => 'required',
			'file_upload' => 'required'
		]);

		$jenis = new Jenis_mobil;
        $jenis->nama = $request->jenis_mobil;

        $file = $request->file('file_upload');
        $filename = $request->jenis_mobil.".".\File::extension($file->getClientOriginalName());
        $jenis->foto  = $filename;
        \Storage::disk('public')->put('images/jenis_mobil/'.$filename, file_get_contents($file));

        $jenis->save();


        Alert::success('Berhasil', 'Jenis Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function hapus_jenis(Request $request){

        // dd($request->all());

        $jenis = Jenis_mobil::where('id', $request->id_hapus)->first();
        \Storage::disk('public')->delete('images/jenis_mobil/'.$jenis->foto);

        Jenis_mobil::where('id', $request->id_hapus)->delete();

        Alert::success('Berhasil', 'Jenis Berhasil Dihapus');
        return redirect()->back();

    }

}
