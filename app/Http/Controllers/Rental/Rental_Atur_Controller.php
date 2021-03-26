<?php

namespace App\Http\Controllers\Rental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kelurahan;
use App\Models\Rental;
use App\Models\Foto_rental;
use App\Models\Video_rental;
use Session;
use Alert;

class Rental_Atur_Controller extends Controller
{
    //
    public function index(){

        $kel = Kelurahan::orderBy('kelurahan','asc')->get();

        $rental = Rental::find(Session::get('rental_id'));
        // dd($rental);
        $daftar_video = Video_rental::where('rental_id', Session::get('rental_id'))->first();

        $video = '';

        if($daftar_video){

            $link =  $daftar_video->link;

            if(preg_match('/youtube.com/', $link)){
                $video = trim(substr($link, strpos($link, '=')+1));
            }
            else{
                $video = trim(substr($link, strpos($link, '.be/')+4));
            }

        }


        return view('users/rental/atur/index', compact('rental','kel','video'));
    }

    public function simpan_atur_rental($jenis, Request $request){
        // dd($request->all());

        if($jenis == 'informasi-rental'){

            $rental = Rental::where('id', Session::get('rental_id'))->first();

            if($request->get('pemilik_rental')){

                $rental->pemilik = $request->pemilik_rental;
            }

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
            $foto_rental->rental_id = Session::get('rental_id');
            $file = $request->file('file_upload');
            $filename = Str::random(25).".".\File::extension($file->getClientOriginalName());
            $foto_rental->foto  = $filename;
            \Storage::disk('public')->put('upload/rental/'.Session::get('rental_id').'/img/'.$filename, file_get_contents($file));
            $foto_rental->save();

            Alert::success('Berhasil', 'Foto Rental Berhasil Ditambahkan');

            return redirect()->back();
        }
        elseif($jenis == 'video-rental'){

            $video = new Video_rental;
            $video->rental_id = Session::get('rental_id');
            $video->link = $request->video_rental;
            $video->save();

            Alert::success('Berhasil', 'Video Rental Berhasil Ditambahkan');
            return redirect()->back();
        }

    }

    public function hapus_foto_atur_rental(Request $request){
        // dd($request->all());

        $foto_rental = Foto_rental::where('id', $request->id_hapus)->first();

        \Storage::disk('public')->delete('upload/rental/'.Session::get('rental_id').'/img/'.$foto_rental->foto);
        Foto_rental::find($request->id_hapus)->delete();

        Alert::success('Berhasil', 'Foto Berhasil Dihapus');

        return redirect()->back();
    }

    public function hapus_video_atur_rental(Request $request){
        // dd($request->all());
        
        Video_rental::find($request->id_hapus_video)->delete();

        Alert::success('Berhasil', 'Video Berhasil Dihapus');
        return redirect()->back();

    }
}
