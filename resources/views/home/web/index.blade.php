@extends('layout/home/home')

@section('title')
LPRM SULTENG
@endsection

<?php
// fungsi untuk konversi tanggal ke indonesia
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);     
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

@section('header-scripts')

@endsection

@section('content')
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <div class="hs-item" style=" position: relative;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hs-text">
                            <h2><span>Mau</span> rental</h2>
                            <h2 style="font-size: 7em;">Mobil ?</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                            <a href="#" data-toggle="modal" data-target="#modal-pesan" class="site-btn">Pesan
                                Sekarang</a>
                            <a href="#" class="site-btn sb-c2">Jadi Anggota</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hr-img">
                            <div
                                style="height: 50em; width: 50em; background: #D61B38; border-radius: 50%; position: absolute; top: -30em;">
                            </div>
                            <div style="width: 30em; position: absolute; top: -5em; right: -10em;">
                                <img src="<?=url('/')?>/public/images/home/car.png"
                                    style="width: 100%; min-width: 0px; position: relative;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="intro-section spad" style="background: #101A19; padding-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="display: flex; justify-content: center; ">
                <img src="<?=url('/')?>/public/images/home/second_img.png" style="width: 75%;">
            </div>
            <div class="col-lg-6"
                style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                <p style="color: white !important; text-align: center;">Rental mobil mudah, menggunakan <br>aplikasi
                    <b>kitapura</b><span style="font-style:italic; ">mall</span>.</p>
                <a href="https://play.google.com/store/apps/details?id=com.kailinusantara.kitapuramall"
                    style="text-align:center;color:black;">
                    <h3 style="font-weight: 600; color: white !important;"> Download Disini</h3>
                    <img src="<?=url('/')?>/public/images/home/download_playstore.svg" style="width: 70%;">
                </a>

            </div>
        </div>
    </div>
</section>


<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top: 0px;">
    <div class="container text-white">
        <div class="section-title">
            <h2>Mobil Kami</h2>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($tipe as $row)
                <div class="swiper-slide">
                    <a href="{{url()->current()}}/tipe-mobil/{{strtolower($row->nama)}}"
                        style='height: 12em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/tipe_mobil/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                        <div
                            style="padding-left: 0.8em; text-align: left; color: white;width: 100%; display: flex; justify-content: space-between; position: relative;">
                            <div style="font-weight: 500;  font-size: 1.3em;">{{$row->nama}} <span
                                    style="font-size: 0.5em; font-weight: 500;">{{$row->merk_mobil->nama}}</span></div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 0.8em;">
                            <div
                                style="font-size: 0.7em; color: white; padding-left: 1.3em; width: 100%; display: flex; align-items: center;">
                                <img src="<?=url('/')?>/public/images/home/icon/mobil_white.svg"
                                    style="width: 1em;">&nbsp;<span style="padding-top: 0.2em;">{{$row->mobil->count()}}
                                    Mobil</span>&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<section class="hero-section" style="padding-top: 0;">
    <div class="hero-slider owl-carousel">
        <div class="hs-item" style="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hs-text" style="padding-top: 0;">
                            <h2><span style="color: white;">Visi</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                        </div>
                        <div class="hs-text" style="padding-top: 0;">
                            <h2><span style="color: white;">Misi</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                        </div>

                    </div>
                    <div class="col-lg-5">
                        <div
                            style="width: 30em; height: 30em; background: #D61B38; border-radius: 50%; position: absolute; padding-top: 3em; top: 0em;">
                            <img src="<?=url('/')?>/public/images/home/third_car.png" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="how-section spad set-bg" style="background: #101A19; padding-top: 0px;">
    <div class="container text-white">
        <div class="section-title">
            <h2 style="width: 100%; text-align: center;">Mengapa Kami ?</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="concept-item"
                    style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                    <div style="width: 5em; height: 5em; padding-top: 0.2em; margin-bottom: 1em;">
                        <img src="<?=url('/')?>/public/images/home/icon/service_3.svg" alt="" style="width: 90%;">
                    </div>
                    <h4>Proses Cepat</h4>
                    <div style="line-height: 1.2em; width: 85%; font-size: 0.9em; margin-top: 1em;">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit. Diam laoreet eget velit dui nisl aliquam tellus mi.</div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="concept-item"
                    style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                    <div style="width: 5em; height: 5em; margin-bottom: 1em;">
                        <img src="<?=url('/')?>/public/images/home/icon/service_1.svg" alt="" style="width: 100%;">
                    </div>
                    <h4>Terpercaya</h4>
                    <div style="line-height: 1.2em; width: 85%; font-size: 0.9em; margin-top: 1em;">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit. Diam laoreet eget velit dui nisl aliquam tellus mi.</div>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="concept-item"
                    style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                    <div style="width: 5em; height: 5em; margin-bottom: 1em;">
                        <img src="<?=url('/')?>/public/images/home/icon/service_2.svg" alt="" style="width: 100%;">
                    </div>
                    <h4>Berpengalaman</h4>
                    <div style="line-height: 1.2em; width: 85%; font-size: 0.9em; margin-top: 1em;">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit. Diam laoreet eget velit dui nisl aliquam tellus mi.</div>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="hero-section" style="padding-top: 0;">
    <div class="hero-slider owl-carousel">
        <div class="hs-item" style="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sub-text">
                            <h2>Sewa Rental Mulai 250ribu</h2>
                            <h3>Tersedia Driver Profesional</h3>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#" data-toggle="modal" data-target="#modal-pesan" class="site-btn">Coba
                                Sekarang</a>
                        </div>
                    </div>
                    <div class="col-lg-6" style="height: 100%;">
                        <ul class="sub-list">
                            <li>
                                <div style="display: flex;">
                                    <img src="<?=url('/')?>/public/images/home/icon/mobil_white.svg" alt=""
                                        style="width: 20%;">
                                    <span style="font-size: 2em;">{{$rental->count()}}+</span>
                                </div>
                                <div style="font-style: 1.2em;">Rental Tergabung</div>
                            </li>
                            <li>
                                <div style="display: flex;">
                                    <img src="<?=url('/')?>/public/images/home/icon/mobil_white.svg" alt=""
                                        style="width: 20%;">
                                    <span style="font-size: 2em;">{{$mobil->count()}}+</span>
                                </div>
                                <div style="font-style: 1.2em;">Mobil yang dapat digunakan</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top: 0px;">
    <div class="container text-white">
        <div class="section-title">
            <h2 style="width: 100%; text-align: center;">Berita</h2>
        </div>
        <div class="row">
            @if($berita->count() != '0')

            @foreach($berita as $row)
            <div class="col-lg-4 col-sm-6 mb-2">
                <div class="concept-item" style="display: flex; justify-content: center; flex-direction: column;">
                    <div style="width: 100%;padding-top: 0.2em; margin-bottom: 0em; border-radius: 1em; padding: 0;">
                        <img src="<?=url('/')?>/public/upload/berita/{{$row->id}}/{{$row->foto}}" alt=""
                            style="width: 100%; border-radius: 0.5em;">
                    </div>
            
                    <div style="display: flex; justify-content: flex-start; font-size: 0.8em; text-align:left;">
                        {{ tgl_indo(date('Y-m-d', strtotime($row->created_at))) }} | {{$row->judul}} </div>
                        
                    <div
                        style="line-height: 1.2em; width: 100%; font-size: 0.95em; margin-top: 0.8em; text-align: justify;">
                        <a href="{{url('/berita/')}}/{{$row->slug}}"
                            style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 0.7em; border-radius: 2em;">Baca
                            Sekarang
                        </a>
                    </div>
                </div>
            </div>

            @endforeach
            @if($berita->count() > 6)
            <div class="col-lg-12 col-sm-12 mt-2">
                <a href="{{url('/berita-selengkapnya')}}"
                    style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 1.0em; border-radius: 2em; display:block; text-align:center;">Berita Selengkapnya
                </a>
            </div>
            @endif
            @else
            <div class="col-lg-12 col-sm-12">
                <div style="line-height: 1.2em; width: 100%; font-size: 2.2em; margin-top: 0.8em; text-align: center;">
                    Belum Memiliki Berita
                </div>
            </div>

            @endif


        </div>
    </div>
</section>

@endsection

@section('modal')

@endsection


@section('footer-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<script>
if (Modernizr.mq('(max-width: 576px)')) {
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
} else {
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
}



</script>

@endsection
