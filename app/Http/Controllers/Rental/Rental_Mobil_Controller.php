<?php

namespace App\Http\Controllers\Rental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Mobil;
use App\Models\Foto_mobil;
use App\Models\Fitur_mobil;
use App\Models\Fitur;
use App\Models\Tipe_mobil;
use Session;
use Alert;

class Rental_Mobil_Controller extends Controller
{
    //
    public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

    public function index(){

        $mobil = Mobil::where('rental_id', Session::get('rental_id'))->get();

        // dd($rental);
        
        return view('users/rental/mobil/index', compact('mobil'));
    }

    public function tambah_mobil_rental(){


        $fitur = Fitur::all();
        $tipe = Tipe_mobil::all();
    
        return view('users/rental/mobil/tambah', compact('fitur','tipe'));
    }

    public function tambah_simpan_mobil_rental(Request $request){


        $this->validate($request,[
			'nama_pemilik' => 'required',
			'alamat_pemilik' => 'required',
            'no_hp_pemilik' => 'required',
			'tipe_mobil' => 'required',
			'tahun_mobil' => 'required',
			'plat_mobil' => 'required',
			'fitur_mobil' => 'required',
			'kapasitas_mobil' => 'required',
			'bagasi_mobil' => 'required',
            'harga_per_hari' => 'required'

		]);

        $mobil_id = $this->autocode('mobil');  
    
		$mobil = new Mobil;
        $mobil->id = $mobil_id;
        $mobil->pemilik = $request->nama_pemilik;
        $mobil->alamat_pemilik = $request->alamat_pemilik;
        $mobil->no_hp_pemilik = $request->no_hp_pemilik;
        $mobil->tipe_mobil_id = $request->tipe_mobil;
        $mobil->tahun_mobil = $request->tahun_mobil;
        $mobil->no_plat = $request->plat_mobil;
        $mobil->kapasitas = $request->kapasitas_mobil;
        $mobil->bagasi = $request->bagasi_mobil;
        $mobil->harga_per_hari = $request->harga_per_hari;
        $mobil->status = "ready";
        $mobil->rental_id = Session::get('rental_id');
        $mobil->save();

        $fitur = $request->get('fitur_mobil');	

        for ($i = 0; $i < count($fitur); $i++) {
			$fitur_mobil = new Fitur_mobil;
			$fitur_mobil->mobil_id = $mobil_id;
			$fitur_mobil->fitur_id = $fitur[$i];
			$fitur_mobil->save();
		}

        Alert::success('Berhasil', 'Mobil Berhasil Ditambahkan');

        return redirect('/superadmin/mobil');
    }

    public function detail_mobil($id){

        $mobil = Mobil::where('id', $id)->where('rental_id', Session::get('rental_id'))->first();
    
        if($mobil){

            $fitur = Fitur::all();
            $tipe = Tipe_mobil::all();
        
            return view('users/rental/mobil/detail', compact('fitur','tipe','mobil'));
        }
        else{

            Alert::info('Mobil', 'Data Tidak Berhasil Ditemukan');

            return redirect()->back();
        }
    
    }

    public function simpan_detail_mobil($id, $jenis, Request $request){


        if($jenis == 'foto-mobil'){

            $foto_mobil = new Foto_mobil;
            $foto_mobil->mobil_id = $id;

            $file = $request->file('file_upload');
            $filename = Str::random(25).".".\File::extension($file->getClientOriginalName());
            $foto_mobil->foto  = $filename;
            \Storage::disk('public')->put('upload/rental/'.Session::get('rental_id').'/img/mobil/'.$id.'/'.$filename, file_get_contents($file));
            $foto_mobil->save();

            Alert::success('Berhasil', 'Foto Mobil Berhasil Ditambahkan');
            return redirect()->back();
        }
        elseif($jenis == 'informasi-mobil'){

            $mobil = Mobil::where('rental_id', Session::get('rental_id'))->where('id', $id)->first();
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
            

            Alert::success('Berhasil', 'Informasi Mobil Berhasil Diperbarui');
            return redirect()->back();
        }
        elseif($jenis == 'informasi-pemilik'){

            $mobil = Mobil::where('rental_id', Session::get('rental_id'))->where('id', $id)->first();
            $mobil->pemilik = $request->nama_pemilik;
            $mobil->alamat_pemilik = $request->alamat_pemilik;
            $mobil->no_hp_pemilik = $request->no_hp_pemilik;
            $mobil->save();

            Alert::success('Berhasil', 'Informasi Pemilik Berhasil Diperbarui');
            return redirect()->back();
        }
    }

    public function hapus_foto_detail_mobil($id, Request $request){

        $foto_mobil = Foto_mobil::where('id', $request->id_hapus)->first();
        \Storage::disk('public')->delete('upload/rental/'.Session::get('rental_id').'/img/mobil/'.$id.'/'.$foto_mobil->foto);
        
        Foto_mobil::find($request->id_hapus)->delete();

        Alert::success('Berhasil', 'Foto Berhasil Dihapus');
        return redirect()->back();

    }

    public function hapus_mobil_rental(Request $request){

        // dd($request->all());
        Mobil::where('id', $request->id_hapus)->where('rental_id', Session::get('rental_id'))->delete();
        Fitur_mobil::where('mobil_id', $request->id_hapus)->delete();
        Foto_mobil::where('mobil_id', $request->id_hapus)->delete();
        \Storage::disk('public')->deleteDirectory('upload/rental/'.Session::get('rental_id').'/img/mobil/'.$request->id_hapus);

        Alert::success('Berhasil', 'Mobil Berhasil Dihapus');
        return redirect()->back();
    }


}
