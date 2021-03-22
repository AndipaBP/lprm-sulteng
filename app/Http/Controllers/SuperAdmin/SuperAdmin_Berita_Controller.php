<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Berita;
use Alert;

class SuperAdmin_Berita_Controller extends Controller
{
    //
    public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

    public function index(){


        $berita = Berita::orderBy('created_at','desc')->get();     
        
        return view('users/superadmin/berita/index', compact('berita'));
    }

    public function tambah_berita(){

        return view('users/superadmin/berita/tambah');
    }

    public function simpan_tambah_berita(Request $request){

        // dd($request->all());

        $this->validate($request, [
            'judul_berita' => 'required',
            'deskripsi_berita' => 'required',
            'file_upload'
        ]);

        $berita_id = $this->autocode('brt'); 

        $deskripsi = $request->get('deskripsi_berita');

        $dom = new \DomDocument();
        $dom->loadHtml($deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){

                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);

                $image_name= Str::random(20).$k.'.png';
                $path = '/public/upload/berita/'.$berita_id.'/'.$image_name;

                \Storage::disk('public')->put('upload/berita/'.$berita_id.'/'.$image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', url('/').$path);
        }

        // dd($deskripsi);
        $deskripsi = $dom->saveHTML();

        // dd($deskripsi);
        $berita = new Berita;
        $berita->id = $berita_id;
        $berita->judul = $request->judul_berita;
        $berita->slug = Str::slug($request->get('judul_berita'));
        $berita->deskripsi = $deskripsi;

        $file = $request->file('file_upload');
        $filename = $berita_id.".".\File::extension($file->getClientOriginalName());
        \Storage::disk('public')->put('upload/berita/'.$berita_id.'/'.$filename, file_get_contents($file));
        $berita->foto  = $filename;

    
        $berita->save();

        Alert::success('Berhasil', 'Berita Berhasil Ditambahkan');
        return redirect('/superadmin/berita');
    }

    public function edit_berita($id){

        $berita = Berita::find($id);

        return view('users/superadmin/berita/ubah', compact('berita'));
    }

    public function simpan_edit_berita($id, Request $request){

        $this->validate($request, [
            'judul_berita' => 'required',
            'deskripsi_berita' => 'required'
        ]);

        $deskripsi = $request->get('deskripsi_berita');
// dd($deskripsi);

        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml($deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 

        $images = $dom->getElementsByTagName('img');

        // dd($images);
        foreach($images as $k => $img){

                $data = $img->getAttribute('src');
                if(preg_match('/data:image/', $data)){

                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
    
                    $image_name= Str::random(20).$k.'.png';
                    $path = '/public/upload/berita/'.$id.'/'.$image_name;
    
                    \Storage::disk('public')->put('upload/berita/'.$id.'/'.$image_name, $data);
    
                    $img->removeAttribute('src');
                    $img->setAttribute('src', url('/').$path);
                }
               
        }
        $deskripsi = $dom->saveHTML();

        $berita = Berita::find($id);
        $berita->judul = $request->judul_berita;
        $berita->slug = Str::slug($request->get('judul_berita'));
        $berita->deskripsi = $deskripsi;

        if($request->file('file_upload')){
            $file = $request->file('file_upload');
            $filename = $id.".".\File::extension($file->getClientOriginalName());
            \Storage::disk('public')->put('upload/berita/'.$id.'/'.$filename, file_get_contents($file));
            $berita->foto  = $filename;
        }

        $berita->save();

        Alert::success('Berhasil', 'Berita Berhasil Diperbarui');
        return redirect('/superadmin/berita');

    }

    public function hapus_berita(Request $request){
        // dd($request->all());
        Berita::where('id', $request->id_hapus)->delete();
        \Storage::disk('public')->deleteDirectory('upload/berita/'.$request->id_hapus);

        Alert::success('Berhasil', 'Berita Berhasil Dihapus');
        
        return redirect()->back();
    }
}
