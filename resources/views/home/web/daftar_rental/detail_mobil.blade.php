@extends('layout/home/home')

@section('title')
{{$mobil->rental->nama}} | LPRM SULTENG
@endsection


@section('header-scripts')

@endsection

@section('content')

<section class="how-section mspad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top:25px;">
    <div class="container text-white">
        <div class="section-title">
            <h2>{{$mobil->rental->nama}} | {{$mobil->no_plat}}</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="" style="padding: 1.2em 1.2em 1.2em 1.2em;background: white; border-radius: 12px;">
                    <div class="p-2">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @if($mobil->foto_mobil->count() == '0')
                                <div class="swiper-slide">
                                    <div
                                        style='height: 35em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/tipe_mobil/{{$mobil->tipe_mobil->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                                    </div>
                                </div>

                                @else
                                @foreach($mobil->foto_mobil as $row)
                                <div class="swiper-slide">
                                    <div
                                        style='height: 35em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/upload/rental/{{$mobil->rental->id}}/img/mobil/{{$mobil->id}}/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                                    </div>
                                </div>

                                @endforeach

                                @endif
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="text-dark" style="font-weight: 600; font-size: 1.2em;">{{$mobil->no_plat}}</div>
                    <div class="mb-2 text-dark" style="font-weight: 600; font-size: 1.2em;">{{$mobil->tipe_mobil->nama}}
                        -
                        {{$mobil->tipe_mobil->merk_mobil->nama}}</div>

                    <div class="text-dark"
                        style="font-size: 0.7em; color: black; width: 100%; display: flex; align-items: center; color: #959595;">
                        <img src="<?=url('/')?>/public/images/icon_svg/kapasitas_pink.svg"
                            style="width: 1em;">&nbsp;<span class="text-dark"
                            style="padding-top: 0.2em;">{{$mobil->kapasitas}}
                            Orang</span>&nbsp;&nbsp;&nbsp;
                        <img src="<?=url('/')?>/public/images/icon_svg/bagasi_pink.svg"
                            style="width: 1.2em;">&nbsp;<span class="text-dark"
                            style="padding-top: 0.2em;">{{$mobil->kapasitas}}
                            Bagasi</span>
                    </div>
                    <div style="font-size: 0.7em; width: 100%; display: flex; align-items: center; color: #959595;">
                        <img src="<?=url('/')?>/public/images/icon_svg/car_pink.svg" style="width: 1em;">&nbsp;<span
                            class="text-dark" style="padding-top: 0.2em;">Tahun {{$mobil->tahun_mobil}} atau
                            setelahnya</span>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div style="font-size: 0.7em; color: #959595; margin-top: 1em;">Fitur</div>
                    <div style="display: flex;">
                        @foreach($mobil->fitur_mobil as $row)
                        <div
                            style="border: #FF435E; background: #FF435E; color: white; font-size: 0.7em; padding: 0.3em 1em; border-radius: 1em; margin-right: 0.5em;">
                            {{$row->fitur->nama}}</div>
                        @endforeach
                    </div>
                    <hr>
                    <div data-toggle="modal" data-target="#modal-pesan"
                    style="cursor: pointer; background: #FF435E; padding: 0.6em; text-align: center; color: white; margin-bottom: 0.5em; margin-top: 1em; border-radius:15px;">
                    Pesan Sekarang
                </div>
                </div>
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
        slidesPerView: 1,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

</script>

@endsection
