<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tipe_mobil;
use App\Models\Mobil;
use App\Models\Fitur;
use App\Models\Foto_mobil;
use App\Models\Fitur_mobil;
use Alert;

class SuperAdmin_Mobil_Controller extends Controller
{
    //

    public function index(){

        $tipe = Tipe_mobil::orderBy('nama','asc')->get();

        return view('users/superadmin/mobil/index', compact('tipe'));
    }

    public function tipe_mobil($id){

        // dd($id);
        $mobil = Mobil::where('tipe_mobil_id', $id)->get();

        // dd($mobil);
        $tipe = Tipe_mobil::find($id);
        // dd($tipe);
        if($mobil->count() != 0){

            return view('users/superadmin/mobil/tipe/index', compact('mobil','tipe'));
        }
        else{

            Alert::info('Pemberitahuan', 'Belum Mempunyai Mobil Rental, Silahkan Tambah Mobil Terlebih Dahulu');
            return redirect()->back();
        }

    }

    public function detail_mobil($tipe, $id){

        $mobil = Mobil::find($id);
        $fitur = Fitur::all();
        $tipe = Tipe_mobil::all();
    
        return view('users/superadmin/mobil/tipe/detail', compact('fitur','tipe','mobil'));
    }

    public function simpan_detail_mobil($tipe, $id, $jenis, Request $request){

        // dd($id);
        // dd($request->all());
        if($jenis == 'foto-mobil'){
            $foto_mobil = new Foto_mobil;
            $foto_mobil->mobil_id = $id;
            $file = $request->file('file_upload');
            $filename = Str::random(25).".".\File::extension($file->getClientOriginalName());
            $foto_mobil->foto  = $filename;
            \Storage::disk('public')->put('upload/rental/'.$request->rental_id.'/img/mobil/'.$id.'/'.$filename, file_get_contents($file));
            $foto_mobil->save();

            Alert::success('Berhasil', 'Foto Mobil Berhasil Ditambahkan');
            return redirect()->back();
        }
        elseif($jenis == 'informasi-mobil'){

            $mobil = Mobil::where('id', $id)->first();
            $mobil->tipe_mobil_id = $request->tipe_mobil;
            $mobil->tahun_mobil = $request->tahun_mobil;
            $mobil->no_plat = $request->plat_mobil;
            $mobil->kapasitas = $request->kapasitas_mobil;
            $mobil->bagasi = $request->bagasi_mobil;
            $mobil->harga_per_hari = $request->harga_per_hari;
            $mobil->status = $request->status_mobil;
            $mobil->save();

            $fitur = $request->get('fitur_mobil');	

            Fitur_mobil::where('mobil_id',$id)->delete();

            for ($i = 0; $i < count($fitur); $i++) {
                $fitur_mobil = new Fitur_mobil;
                $fitur_mobil->mobil_id = $id;
                $fitur_mobil->fitur_id = $fitur[$i];
                $fitur_mobil->save();
            }
            

            Alert::success('Berhasil', 'Informasi Mobil Berhasil Diubah');
            return redirect()->back();
        }
        elseif($jenis == 'informasi-pemilik'){

            $mobil = Mobil::where('id', $id)->first();
            $mobil->pemilik = $request->nama_pemilik;
            $mobil->alamat_pemilik = $request->alamat_pemilik;
            $mobil->no_hp_pemilik = $request->no_hp_pemilik;
            $mobil->save();
            Alert::success('Berhasil', 'Informasi Pemilik Berhasil Diubah');
            return redirect()->back();
        }


    }

    public function hapus_foto_detail_mobil($tipe, $id, Request $request){

        $foto_mobil = Foto_mobil::where('id', $request->id_hapus)->first();
        \Storage::disk('public')->delete('upload/rental/'.$request->rental_id.'/img/mobil/'.$id.'/'.$foto_mobil->foto);
        Foto_mobil::find($request->id_hapus)->delete();

        Alert::success('Berhasil', 'Foto Berhasil Dihapus');
        return redirect()->back();

    }

}
