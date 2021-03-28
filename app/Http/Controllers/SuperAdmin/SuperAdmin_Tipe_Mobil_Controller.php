<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipe_mobil;
use App\Models\Merk_mobil;
use App\Models\Jenis_mobil;
use Alert;

class SuperAdmin_Tipe_Mobil_Controller extends Controller
{
    //

    public function index(){
        
        $tipe = Tipe_mobil::all();
        $merk = Merk_mobil::all();
        $jenis = Jenis_mobil::all();
        
        return view('users/superadmin/spesifikasi-mobil/tipe/index', compact('tipe','merk','jenis'));
    }

    public function simpan_tipe(Request $request){

        // dd($request->all());

        $this->validate($request,[
			'tipe_mobil' => 'required',
            'merk_mobil' => 'required',
            'jenis_mobil' => 'required',
			'file_upload' => 'required'
		]);

		$tipe = new Tipe_mobil;
        $tipe->nama = $request->tipe_mobil;
        $tipe->merk_mobil_id = $request->merk_mobil;
        $tipe->jenis_mobil_id = $request->jenis_mobil;
        $file = $request->file('file_upload');
        $filename = $request->tipe_mobil.".".\File::extension($file->getClientOriginalName());
        $tipe->foto  = $filename;
        \Storage::disk('public')->put('images/tipe_mobil/'.$filename, file_get_contents($file));

        $tipe->save();


        Alert::success('Berhasil', 'Tipe Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function hapus_tipe(Request $request){

        // dd($request->all());

        $tipe = Tipe_mobil::where('id', $request->id_hapus)->first();
        \Storage::disk('public')->delete('images/tipe_mobil/'.$tipe->foto);

        Tipe_mobil::where('id',$request->id_hapus)->delete();

        Alert::success('Berhasil', 'Tipe Berhasil Dihapus');
        return redirect()->back();

    }


}
