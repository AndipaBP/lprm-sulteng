@extends('layout/home/home')

@section('title')
{{$tipe_mobil->nama}} | LPRM SULTENG
@endsection


@section('header-scripts')

@endsection

@section('content')

<section class="how-section mspad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top:25px;">
    <div class="container text-white">
        <div class="section-title">
            <h2>{{$tipe_mobil->nama}} | {{$mobil->no_plat}}</h2>
        </div>
        <div class="row">
            <div class="col-lg-7 mb-3">
                <div class="" style="padding: 1.2em 1.2em 1.2em 1.2em;background: white; border-radius: 12px;">
                    <div class="p-2">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @if($mobil->foto_mobil->count() == '0')
                                <div class="swiper-slide">
                                    <div
                                        style='height: 20em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/default/image_not_available.png"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                                    </div>
                                </div>

                                @else
                                @foreach($mobil->foto_mobil as $row)
                                <div class="swiper-slide">
                                    <div
                                        style='height: 20em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/upload/rental/{{$mobil->rental->id}}/img/mobil/{{$mobil->id}}/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
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
                    </div>
                    <div style="font-size: 0.7em; width: 100%; display: flex; align-items: center; color: #959595;">
                        <img src="<?=url('/')?>/public/images/icon_svg/car_pink.svg" style="width: 1em;">&nbsp;<span
                            class="text-dark" style="padding-top: 0.2em;">Tahun {{$mobil->tahun_mobil}} atau
                            setelahnya</span>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div
                        style=" background: #FF435E; padding: 0.6em; text-align: center; color: white; margin-bottom: 0.5em; margin-top: 1em; border-radius:15px;">
                        Mulai Dari Rp. {{number_format($mobil->harga_per_hari,0,',','.')}} Per/Hari
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class=""
                    style="padding: 1.2em 1.2em 1.2em 1.2em;background: white; border-radius: 12px; color:black;">
                    <div style="display: flex; align-items: center;">
                        <div style="width: 20%;">
                            <img src="<?=url('/')?>/public/images/rental.svg" style="width: 100%;">
                        </div>
                        <div style="width: 80%; padding-left: 0.5em;">
                            <div style="font-size: 0.8em; line-height: 0.9em;">Disediakan Oleh</div>
                            <div style="font-weight: 600;">{{$mobil->rental->nama}}</div>
                            <div
                                style="padding: 0; margin: 0; font-size: 0.7em; line-height: 1.5em; margin-top: 0em; margin-bottom: 0.5em;">
                                <i class="fas fa-star star-rating"></i>
                                <i class="fas fa-star star-rating"></i>
                                <i class="fas fa-star star-rating"></i>
                                <i class="fas fa-star star-rating"></i>
                                <i class="far fa-star star-rating"></i>
                            </div>
                            <a href="{{url('/daftar-rental')}}/{{strtolower($mobil->rental->id)}}" class=""
                                style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 0.9em; border-radius: 2em;">Lihat
                                Rental</a>
                        </div>
                    </div>
                    <hr>
                    <div style="font-weight: 600; font-size: 1.0em;">Alamat Rental Mobil</div>
                    <div style="font-weight: 600; font-size: 0.8em;">
                        {{$mobil->rental->kelurahan->kelurahan}},
                        {{ucwords($mobil->rental->kelurahan->kecamatan->nama)}}, KOTA PALU</div>
                    <div style="color: #828282; font-size: 0.85em;">{{$mobil->rental->alamat}}</div>
                    @if (($mobil->rental->lat == null) && ($mobil->rental->lng == null))
                    <div
                        style="background: #FF435E; padding: 0.3em; text-align: center; color: white; margin-bottom: 0.5em; margin-top: 1em; border-radius:15px;">
                        Belum Memiliki Lokasi di Peta</div>
                    @else
                    <a
                        href="https://www.google.com/maps/search/?api=1&query={{$mobil->rental->lat}},{{$mobil->rental->lng}}">
                        <div
                            style="background: #FF435E; padding: 0.3em; text-align: center; color: white; margin-bottom: 0.5em; margin-top: 1em; border-radius:15px;">
                            Lihat Lokasi di Peta</div>
                    </a>
                    @endif
                </div>
                <div data-toggle="modal" data-target="#modal-pesan"
                    style="cursor: pointer; background: #FF435E; padding: 0.6em; text-align: center; color: white; margin-bottom: 0.5em; margin-top: 1em; border-radius:15px;">
                    Pesan Sekarang
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
