@extends('layout/home/home')

@section('title')
LPRM SULTENG
@endsection


@section('header-scripts')

@endsection

@section('content')
<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top: 25px;">
    <div class="container text-white">
        <div class="row">
            <div class="col-9 col-sm-12">
                <div class="section-title">
                    <h2>Jenis Mobil</h2>
                </div>

            </div>
            <div class="col-3 col-sm-3">
            
            
            </div>



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
