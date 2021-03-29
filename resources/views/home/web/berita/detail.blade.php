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
<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top: 25px;">
    <div class="container text-white">
        <div class="row">
            <div class="col-12 col-sm-12 mb-3">
                <div class="section-title mb-0">
                    <h2>{{$berita->judul}}</h2>
                </div>
                <div class="concept-item" style="display: flex; justify-content: center; flex-direction: column;">
                    <div style="width: 100%;padding-top: 0.2em; margin-bottom: 0em; border-radius: 1em; padding: 0;">
                        <img src="<?=url('/')?>/public/upload/berita/{{$berita->id}}/{{$berita->foto}}" alt=""
                            style="width: 100%; border-radius: 0.5em;">
                    </div>
                    <div style="display: flex; justify-content: flex-start; font-size: 1.4em; text-align:left; border-bottom: 1px solid white; margin-bottom:1em;">
                        {{ tgl_indo(date('Y-m-d', strtotime($berita->created_at))) }} </div>
                  
                    <div class="" style="text-align:justify; color:white !important;">
                        {!! $berita->deskripsi !!}

                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-12 mt-3">
                <h3>Berita Lainnya</h3>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($berita_lainnya as $row)
                        <div class="swiper-slide">
                            <a href="{{url('/berita/')}}/{{$row->slug}}"
                                style='height: 12em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/upload/berita/{{$row->id}}/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>


            </div>



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
