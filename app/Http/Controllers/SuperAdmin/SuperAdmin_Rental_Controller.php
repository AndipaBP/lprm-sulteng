<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kelurahan;
use App\Models\Rental;
use App\Models\Foto_rental;
use App\Models\User;
use App\Models\Mobil;
use Alert;




class SuperAdmin_Rental_Controller extends Controller
{
    //

    public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

    public function index(){

        $rental = Rental::orderBy('nama','asc')->get();     
        
        return view('users/superadmin/rental/index', compact('rental'));
    }

    public function tambah_rental(){

        $kel = Kelurahan::orderBy('kelurahan','asc')->get();

        return view('users/superadmin/rental/tambah', compact('kel'));
    }

    public function tambah_simpan_rental(Request $request){

        // dd($request->all());
        $this->validate($request,[
			'username' => 'required',
			'password' => 'required',
            'nama_rental' => 'required',
			'no_hp' => 'required',
			'alamat' => 'required',
			'kelurahan' => 'required',
		]);

        $users_id = $this->autocode('Usr-');     

		$user = new User;
        $user->id = $users_id;
        $user->username = $request->username;
        $user->level_akses = "Rental";
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        if($request->get('email')){
            $user->email = $request->email;
        }
        $user->save();


		$rental_id = $this->autocode('Rnt-');
		// @Tambah Toko
		$rental = new Rental;
        $rental->id = $rental_id;
        $rental->users_id = $users_id;
        $rental->nama = $request->nama_rental;
        $rental->nomor_hp = $request->no_hp;
        $rental->alamat = $request->alamat;
        
        $rental->kelurahan_id = $request->kelurahan;
        if($request->get('latitude')){
            $rental->lat = $request->latitude;
        }
        if($request->get('longitude')){
            $rental->lng = $request->longitude;
        }
        $rental->save();


        Alert::success('Berhasil', 'Rental Berhasil Ditambahkan');
        return redirect('/superadmin/rental');
    }

    public function detail_rental($id){

        // 
        $user = User::where('id', $id)->first();
        $rental = Rental::where('users_id',$id)->first();
        $kel = Kelurahan::orderBy('kelurahan','asc')->get();
    
        return view('users/superadmin/rental/detail', compact('user','rental','kel'));
    }

    public function detail_simpan_rental($id, $jenis, Request $request){

        // dd($request->all());

        if($jenis == 'akun'){
            
            $user = User::where('id', $id)->first();
            
            if($request->get('username')){

                $user->username = $request->username;
            }

            if($request->get('email')){

                $user->email = $request->email;
            }

            if($request->get('password')){

                $user->username = bcrypt($request->password);
            }

            $user->save();

            Alert::success('Berhasil', 'Informasi Akun Berhasil Diperbarui');
            return redirect()->back();
        }
        elseif($jenis == 'informasi-rental'){

            $rental = Rental::where('users_id',$id)->first();

            if($request->get('nama_rental')){

                $rental->nama = $request->nama_rental;
            }

            if($request->get('no_hp')){

                $rental->nomor_hp = $request->no_hp;
            }

            if($request->get('alamat')){

                $rental->alamat = $request->alamat;
            }

            if($request->get('kelurahan')){

                $rental->kelurahan_id = $request->kelurahan;
            }

            if($request->get('latitude')){

                $rental->lat = $request->latitude;
            }

            if($request->get('longitude')){

                $rental->lng = $request->longitude;
            }

            $rental->save();

            Alert::success('Berhasil', 'Informasi Rental Berhasil Diperbarui');
            return redirect()->back();
        }
        elseif($jenis == 'foto-rental'){

            $foto_rental = new Foto_rental;
            $foto_rental->rental_id = $request->rental_id;
            $file = $request->file('file_upload');
            $filename = Str::random(25).".".\File::extension($file->getClientOriginalName());
            $foto_rental->foto  = $filename;
            \Storage::disk('public')->put('upload/rental/'.$request->rental_id.'/img/'.$filename, file_get_contents($file));
            $foto_rental->save();

            Alert::success('Berhasil', 'Foto Rental Berhasil Ditambahkan');
            return redirect()->back();
        }
    }

    public function hapus_foto_detail_rental($id, Request $request){
        // dd($request->all());

        $foto_rental = Foto_rental::where('id', $request->id_hapus)->first();
        \Storage::disk('public')->delete('upload/rental/'.$request->rental_id.'/img/'.$foto_rental->foto);
        Foto_rental::find($request->id_hapus)->delete();

        Alert::success('Berhasil', 'Foto Berhasil Dihapus');
        return redirect()->back();

    }

    public function hapus_rental(Request $request){

		$rental = Rental::where('users_id', $request->id_hapus)->first();
        
		User::where('id', $request->id_hapus)->delete();
		Rental::where('users_id', $request->id_hapus)->delete();
        Foto_rental::find($rental->id)->delete();

        \Storage::disk('public')->deleteDirectory('upload/rental/'.$rental->id);
        
        Alert::success('Berhasil', 'Rental Berhasil Dihapus');
        return redirect()->back();
    }


}
