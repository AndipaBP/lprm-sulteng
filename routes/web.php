<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth_Controller;
use App\Http\Controllers\Akun_Controller;
// SuperAdmin
use App\Http\Controllers\SuperAdmin\SuperAdmin_Controller;
use App\Http\Controllers\SuperAdmin\SuperAdmin_Rental_Controller;
use App\Http\Controllers\SuperAdmin\SuperAdmin_Rental_Mobil_Controller;
use App\Http\Controllers\SuperAdmin\SuperAdmin_Mobil_Controller;
use App\Http\Controllers\SuperAdmin\SuperAdmin_Jenis_Mobil_Controller;
use App\Http\Controllers\SuperAdmin\SuperAdmin_Merk_Mobil_Controller;
use App\Http\Controllers\SuperAdmin\SuperAdmin_Tipe_Mobil_Controller;
use App\Http\Controllers\SuperAdmin\SuperAdmin_Fitur_Mobil_Controller;
use App\Http\Controllers\SuperAdmin\SuperAdmin_Berita_Controller;
// Rental
use App\Http\Controllers\Rental\Rental_Controller;
use App\Http\Controllers\Rental\Rental_Atur_Controller;
use App\Http\Controllers\Rental\Rental_Mobil_Controller;
// Home
use App\Http\Controllers\Home\Home_Controller;
use App\Http\Controllers\Home\Home_Mobil_Controller;
use App\Http\Controllers\Home\Home_Rental_Controller;
use App\Http\Controllers\Home\Home_Profil_Controller;
use App\Http\Controllers\Home\Home_Berita_Controller;


// Mobile
use App\Http\Controllers\Mobile\Mobile_Controller;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// HOME
Route::get('/', [Home_Controller::class, 'index']);
Route::get('/tipe-mobil/{id}', [Home_Controller::class, 'tipe_mobil']);
Route::get('/tipe-mobil/{id}/{no_plat}', [Home_Controller::class, 'tipe_mobil_detail_mobil']);
Route::get('/daftar-mobil', [Home_Mobil_Controller::class, 'daftar_mobil']);
Route::get('/daftar-mobil/{jenis}/{id}', [Home_Mobil_Controller::class, 'jenis_daftar_mobil']);
Route::get('/daftar-mobil/{jenis}/{id}/{no_plat}', [Home_Mobil_Controller::class, 'detail_jenis_daftar_mobil']);
Route::get('/daftar-rental', [Home_Rental_Controller::class, 'daftar_rental']);
Route::get('/daftar-rental/{id}', [Home_Rental_Controller::class, 'detail_rental']);
Route::get('/daftar-rental/{id}/{no_plat}', [Home_Rental_Controller::class, 'mobil_detail_rental']);
Route::get('/daftar-rental/{id}/{no_plat}', [Home_Rental_Controller::class, 'mobil_detail_rental']);

Route::get('/tentang-kami', [Home_Profil_Controller::class, 'tentang_kami']);







// MOBILE
Route::get('/mobile', [Mobile_Controller::class, 'home']);
Route::get('/mobile/mobil', [Mobile_Controller::class, 'mobil']);
Route::get('/mobile/mobil/{id}', [Mobile_Controller::class, 'tipe_mobil']);
Route::get('/mobile/mobil/{id}/{no_plat}', [Mobile_Controller::class, 'detail_mobil']);

Route::group(['middleware'=> 'guest'], function() {
    Route::get('/login', [Auth_Controller::class, 'login'])->name('login');
    Route::post('/login/post', [Auth_Controller::class, 'post_login']);
});

Route::group(['middleware'=> 'auth'], function() {

    Route::put('/ganti-password', [Auth_Controller::class, 'ganti_password']);
    Route::get('/logout', [Auth_Controller::class, 'logout'])->name('logout');

    Route::get('/{level_akses}/pengaturan-akun', [Akun_Controller::class, 'index']);
    Route::put('/{level_akses}/pengaturan-akun/simpan', [Akun_Controller::class, 'simpan_data_akun']);

    Route::group(['middleware'=> 'superadmin'], function() {
        // Dashboard 
        Route::get('/superadmin', [SuperAdmin_Controller::class, 'dashboard']);

        // Rental
        Route::get('/superadmin/rental', [SuperAdmin_Rental_Controller::class, 'index']);
        Route::get('/superadmin/rental/tambah', [SuperAdmin_Rental_Controller::class, 'tambah_rental']);
        Route::post('/superadmin/rental/tambah/simpan', [SuperAdmin_Rental_Controller::class, 'tambah_simpan_rental']);

        Route::get('/superadmin/rental/detail/{id}', [SuperAdmin_Rental_Controller::class, 'detail_rental']);
        Route::put('/superadmin/rental/detail/{id}/{jenis}/simpan', [SuperAdmin_Rental_Controller::class, 'detail_simpan_rental']);
        Route::delete('/superadmin/rental/detail/{id}/hapus-foto', [SuperAdmin_Rental_Controller::class, 'hapus_foto_detail_rental']);

        Route::delete('/superadmin/rental/hapus', [SuperAdmin_Rental_Controller::class, 'hapus_rental']);

        Route::get('/superadmin/rental/{id}/mobil', [SuperAdmin_Rental_Mobil_Controller::class, 'index']);
        Route::get('/superadmin/rental/{id}/mobil/tambah', [SuperAdmin_Rental_Mobil_Controller::class, 'tambah_mobil_rental']);
        Route::post('/superadmin/rental/{id}/mobil/tambah/simpan', [SuperAdmin_Rental_Mobil_Controller::class, 'tambah_simpan_mobil_rental']);
        Route::delete('/superadmin/rental/{id}/mobil/hapus', [SuperAdmin_Rental_Mobil_Controller::class, 'hapus_mobil_rental']);

        Route::get('/superadmin/rental/{id}/mobil/{id2}', [SuperAdmin_Rental_Mobil_Controller::class, 'detail_mobil']);
        Route::put('/superadmin/rental/{id}/mobil/{id2}/{jenis}/simpan', [SuperAdmin_Rental_Mobil_Controller::class, 'simpan_detail_mobil']);
        Route::delete('/superadmin/rental/{id}/mobil/{id2}/hapus-foto', [SuperAdmin_Rental_Mobil_Controller::class, 'hapus_foto_detail_mobil']);


        // Mobil
        Route::get('/superadmin/mobil', [SuperAdmin_Mobil_Controller::class, 'index']);
        Route::get('/superadmin/mobil/{tipe}', [SuperAdmin_Mobil_Controller::class, 'tipe_mobil']);

        Route::get('/superadmin/mobil/{tipe}/{id}', [SuperAdmin_Mobil_Controller::class, 'detail_mobil']);
        Route::put('/superadmin/mobil/{tipe}/{id}/{jenis}/simpan', [SuperAdmin_Mobil_Controller::class, 'simpan_detail_mobil']);
        Route::delete('/superadmin/mobil/{tipe}/{id}/hapus-foto', [SuperAdmin_Mobil_Controller::class, 'hapus_foto_detail_mobil']);
        
        // Spesifikasi Mobil
        Route::get('/superadmin/spesifikasi-mobil/jenis', [SuperAdmin_Jenis_Mobil_Controller::class, 'index']);
        Route::post('/superadmin/spesifikasi-mobil/jenis/simpan', [SuperAdmin_Jenis_Mobil_Controller::class, 'simpan_jenis']);
        Route::delete('/superadmin/spesifikasi-mobil/jenis/hapus', [SuperAdmin_Jenis_Mobil_Controller::class, 'hapus_jenis']);

        Route::get('/superadmin/spesifikasi-mobil/merk', [SuperAdmin_Merk_Mobil_Controller::class, 'index']);
        Route::post('/superadmin/spesifikasi-mobil/merk/simpan', [SuperAdmin_Merk_Mobil_Controller::class, 'simpan_merk']);
        Route::delete('/superadmin/spesifikasi-mobil/merk/hapus', [SuperAdmin_Merk_Mobil_Controller::class, 'hapus_merk']);

        Route::get('/superadmin/spesifikasi-mobil/tipe', [SuperAdmin_Tipe_Mobil_Controller::class, 'index']);
        Route::post('/superadmin/spesifikasi-mobil/tipe/simpan', [SuperAdmin_Tipe_Mobil_Controller::class, 'simpan_tipe']);
        Route::delete('/superadmin/spesifikasi-mobil/tipe/hapus', [SuperAdmin_Tipe_Mobil_Controller::class, 'hapus_tipe']);

        Route::get('/superadmin/spesifikasi-mobil/fitur', [SuperAdmin_Fitur_Mobil_Controller::class, 'index']);
        Route::post('/superadmin/spesifikasi-mobil/fitur/simpan', [SuperAdmin_Fitur_Mobil_Controller::class, 'simpan_fitur']);
        Route::delete('/superadmin/spesifikasi-mobil/fitur/hapus', [SuperAdmin_Fitur_Mobil_Controller::class, 'hapus_fitur']);

        // Berita

        Route::get('/superadmin/berita', [SuperAdmin_Berita_Controller::class, 'index']);
        Route::get('/superadmin/berita/tambah', [SuperAdmin_Berita_Controller::class, 'tambah_berita']);
        Route::post('/superadmin/berita/tambah/simpan', [SuperAdmin_Berita_Controller::class, 'simpan_tambah_berita']);

        Route::get('/superadmin/berita/{id}', [SuperAdmin_Berita_Controller::class, 'edit_berita']);
        Route::put('/superadmin/berita/{id}/simpan', [SuperAdmin_Berita_Controller::class, 'simpan_edit_berita']);

        Route::delete('/superadmin/berita/hapus', [SuperAdmin_Berita_Controller::class, 'hapus_berita']);

    });

    Route::group(['middleware'=> 'rental'], function() {
        // Rental
        Route::get('/rental', [Rental_Controller::class, 'index']);

        // Atur Rental
        Route::get('/rental/atur-rental', [Rental_Atur_Controller::class, 'index']);
        Route::put('/rental/atur-rental/{jenis}/simpan', [Rental_Atur_Controller::class, 'simpan_atur_rental']);
        Route::delete('/rental/atur-rental/hapus-foto', [Rental_Atur_Controller::class, 'hapus_foto_atur_rental']);

        // Mobil
        Route::get('/rental/mobil', [Rental_Mobil_Controller::class, 'index']);

        Route::get('/rental/mobil/tambah', [Rental_Mobil_Controller::class, 'tambah_mobil_rental']);
        Route::post('/rental/mobil/tambah/simpan', [Rental_Mobil_Controller::class, 'tambah_simpan_mobil_rental']);
        Route::delete('/rental/mobil/hapus', [Rental_Mobil_Controller::class, 'hapus_mobil_rental']);

        Route::get('/rental/mobil/{id}', [Rental_Mobil_Controller::class, 'detail_mobil']);
        Route::put('/rental/mobil/{id}/{jenis}/simpan', [Rental_Mobil_Controller::class, 'simpan_detail_mobil']);
        Route::delete('/rental/mobil/{id}/hapus-foto', [Rental_Mobil_Controller::class, 'hapus_foto_detail_mobil']);

    });
    
});