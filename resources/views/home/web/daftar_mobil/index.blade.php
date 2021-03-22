@extends('layout/home/home')

@section('title')
LPRM SULTENG
@endsection


@section('header-scripts')

@endsection

@section('content')
<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top: 25px;">
    <div class="container text-white">
        <div class="section-title">
            <h2>Jenis Mobil</h2>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($jenis as $row)
                <div class="swiper-slide">
                    <a href="{{url()->current()}}/jenis-mobil/{{strtolower($row->nama)}}"
                        style='height: 12em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/jenis_mobil/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                        <div
                            style="padding-left: 0.8em; text-align: left; color: white;width: 100%; display: flex; justify-content: space-between; position: relative;">
                            <div style="font-weight: 500;  font-size: 1.3em;">{{$row->nama}}</div>
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

<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top: 25px;">
    <div class="container text-white">
        <div class="section-title">
            <h2>Merk Mobil</h2>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($merk as $row)
                <div class="swiper-slide">
                    <a href="{{url()->current()}}/merk-mobil/{{strtolower($row->nama)}}"
                        style='height: 12em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/merk_mobil/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                        <div
                            style="padding-left: 0.8em; text-align: left; color: white;width: 100%; display: flex; justify-content: space-between; position: relative;">
                            <div style="font-weight: 500;  font-size: 1.3em;">{{$row->nama}}</div>
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
