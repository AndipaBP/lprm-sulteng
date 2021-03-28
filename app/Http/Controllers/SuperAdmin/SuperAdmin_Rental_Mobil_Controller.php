<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Rental;
use App\Models\Mobil;
use App\Models\Foto_mobil;
use App\Models\Fitur_mobil;
use App\Models\Fitur;
use App\Models\Tipe_mobil;
use Alert;


class SuperAdmin_Rental_Mobil_Controller extends Controller
{
    //

    public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

    public function index($id){


        $rental = Rental::find($id);

        $mobil = Mobil::where('rental_id',$id)->get();

        // dd($rental);
        
        return view('users/superadmin/rental/mobil/index', compact('rental','mobil'));
    }

    public function tambah_mobil_rental($id){

        $rental = Rental::find($id);
        $fitur = Fitur::all();
        $tipe = Tipe_mobil::all();
    
        return view('users/superadmin/rental/mobil/tambah', compact('fitur','tipe', 'rental'));
        
    }

    public function tambah_simpan_mobil_rental($id, Request $request){

        // dd($request->all());

        $this->validate($request,[
			'nama_pemilik' => 'required',
			'alamat_pemilik' => 'required',
            'no_hp_pemilik' => 'required',
			'tipe_mobil' => 'required',
			'tahun_mobil' => 'required',
			'plat_mobil' => 'required',
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

        $mobil->harga_per_hari = $request->harga_per_hari;
        $mobil->status = "ready";
        $mobil->rental_id = $id;
        
        if($request->kapasitas_mobil){
            $mobil->kapasitas = $request->kapasitas_mobil;
        }
        
        $mobil->save();

        // $fitur = $request->get('fitur_mobil');	

        // for ($i = 0; $i < count($fitur); $i++) {
		// 	$fitur_mobil = new Fitur_mobil;
		// 	$fitur_mobil->mobil_id = $mobil_id;
		// 	$fitur_mobil->fitur_id = $fitur[$i];
		// 	$fitur_mobil->save();
		// }

        Alert::success('Berhasil', 'Mobil Berhasil Ditambahkan');
        return redirect('/superadmin/rental/'.$id.'/mobil');

        // return redirect('/superadmin/rental');

    }

    public function detail_mobil($id, $id2){

        
        $rental = Rental::find($id);
        $mobil = Mobil::find($id2);
        $fitur = Fitur::all();
        $tipe = Tipe_mobil::all();
    
        return view('users/superadmin/rental/mobil/detail', compact('fitur','tipe', 'rental','mobil'));

    }

    public function hapus_mobil_rental($id, Request $request){

        // dd($request->all());
        Mobil::where('id', $request->id_hapus)->where('rental_id',$id)->delete();
        Fitur_mobil::where('mobil_id', $request->id_hapus)->delete();
        Foto_mobil::where('mobil_id', $request->id_hapus)->delete();
        \Storage::disk('public')->deleteDirectory('upload/rental/'.$id.'/img/mobil/'.$request->id_hapus);


        Alert::success('Berhasil', 'Mobil Berhasil Dihapus');
        return redirect()->back();
    }

    public function simpan_detail_mobil($id, $id2, $jenis, Request $request){

        // dd($request->all());

        if($jenis == 'foto-mobil'){

            $foto_mobil = new Foto_mobil;
            $foto_mobil->mobil_id = $id2;

            $file = $request->file('file_upload');
            $filename = Str::random(25).".".\File::extension($file->getClientOriginalName());
            $foto_mobil->foto  = $filename;
            \Storage::disk('public')->put('upload/rental/'.$id.'/img/mobil/'.$id2.'/'.$filename, file_get_contents($file));
            $foto_mobil->save();

            Alert::success('Berhasil', 'Foto Mobil Berhasil Ditambahkan');
            return redirect()->back();
        }
        elseif($jenis == 'informasi-mobil'){

            $mobil = Mobil::where('rental_id', $id)->where('id', $id2)->first();
            $mobil->tipe_mobil_id = $request->tipe_mobil;
            $mobil->tahun_mobil = $request->tahun_mobil;
            $mobil->no_plat = $request->plat_mobil;
            if($request->kapasitas_mobil){
                $mobil->kapasitas = $request->kapasitas_mobil;
            }
            $mobil->harga_per_hari = $request->harga_per_hari;
            $mobil->status = $request->status_mobil;
            $mobil->save();

            // $fitur = $request->get('fitur_mobil');	
            // Fitur_mobil::where('mobil_id',$id2)->delete();

            // for ($i = 0; $i < count($fitur); $i++) {
            //     $fitur_mobil = new Fitur_mobil;
            //     $fitur_mobil->mobil_id = $id2;
            //     $fitur_mobil->fitur_id = $fitur[$i];
            //     $fitur_mobil->save();
            // }
            

            Alert::success('Berhasil', 'Informasi Mobil Berhasil Diperbarui');
            return redirect()->back();
        }
        elseif($jenis == 'informasi-pemilik'){

            $mobil = Mobil::where('rental_id', $id)->where('id', $id2)->first();
            $mobil->pemilik = $request->nama_pemilik;
            $mobil->alamat_pemilik = $request->alamat_pemilik;
            $mobil->no_hp_pemilik = $request->no_hp_pemilik;
            $mobil->save();
            Alert::success('Berhasil', 'Informasi Pemilik Berhasil Diperbarui');
            return redirect()->back();
        }


    }

    public function hapus_foto_detail_mobil($id, $id2, Request $request){
        // dd($request->all());

        $foto_mobil = Foto_mobil::where('id', $request->id_hapus)->first();
        \Storage::disk('public')->delete('upload/rental/'.$id.'/img/mobil/'.$id2.'/'.$foto_mobil->foto);
        
        Foto_mobil::where('id',$request->id_hapus)->delete();

        Alert::success('Berhasil', 'Foto Berhasil Dihapus');
        return redirect()->back();

    }
}
