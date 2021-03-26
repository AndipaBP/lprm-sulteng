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
<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top: 0px;">
    <div class="container text-white">
        <div class="section-title">
            <h2 style="width: 100%; text-align: center;">Berita Selengkapnya</h2>
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
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {!! $berita->links() !!}
        </div>
    </div>
</section>
@endsection

@section('modal')

@endsection


@section('footer-scripts')
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

</script>

@endsection
