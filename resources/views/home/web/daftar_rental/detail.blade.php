@extends('layout/home/home')

@section('title')
{{$rental->nama}} | LPRM SULTENG
@endsection


@section('header-scripts')

@endsection

@section('content')

<section class="how-section mspad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top:25px;">
    <div class="container text-white">
        <div class="section-title">
            <h2>{{$rental->nama}}</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="" style="padding: 1.2em 1.2em 1.2em 1.2em;background: white; border-radius: 12px;">
                    <div class="p-2">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @if($rental->foto_rental->count() == '0')
                                <div class="swiper-slide">
                                    <div
                                        style='height: 20em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/home/image_not_available.png"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                                    </div>
                                </div>

                                @else
                                @foreach($rental->foto_rental as $row)
                                <div class="swiper-slide">
                                    <div
                                        style='height: 20em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/upload/rental/{{$rental->id}}/img/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
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
                    <div class="row">
                        <div class="col-6">
                            <div style="display: flex; align-items: center;color:black;">
                                <div style="width: 20%;">
                                    <img src="<?=url('/')?>/public/images/rental.svg" style="width: 100%;">
                                </div>
                                <div style="width: 80%; padding-left: 0.5em;">
                                    <div style="font-weight: 600; font-size: 1.2em;">{{$rental->nama}}</div>
                                    <div style="font-size: 0.8em; line-height: 0.9em;">Tersedia :
                                        {{$rental->mobil->count()}} Mobil</div>
                                    <div
                                        style="padding: 0; margin: 0; font-size: 0.7em; line-height: 1.5em; margin-top: 0.6em;">
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="far fa-star star-rating"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-dark">
                            <div style="font-weight: 600; font-size: 1.0em;">Alamat Rental Mobil</div>
                            <div style="font-weight: 600; font-size: 0.8em;">
                                {{$rental->kelurahan->kelurahan}},
                                {{ucwords($rental->kelurahan->kecamatan->nama)}}, KOTA PALU</div>
                            <div style="color: #828282; font-size: 0.85em;">{{$rental->alamat}}</div>
                            <div
                                style="background: #FF435E; padding: 0.3em; text-align: center; color: white; margin-bottom: 0.5em; margin-top: 1em; border-radius:15px;">
                                Lihat Lokasi di Peta</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-3">
            @foreach($mobil as $row)
            <div class="col-4">
                <div
                    style='margin-bottom: 1em; background: white; box-shadow: 1px 1px 11px #DAD5CE; border-radius: 12px; padding: 1em 1.5em; background-size: cover; color:black;'>
                    <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                        <div>
                            <div class="text-dark" style="font-size: 0.85em; font-weight: 600;">{{$row->tipe_mobil->nama}}
                            </div>
                            <div class="text-dark" style="font-weight: 600; font-size: 0.8em;">{{$row->tipe_mobil->merk_mobil->nama}}</div>
            
                            <div
                                style="color: #07820C; font-size: 0.7em; display: flex; align-items: flex-start; margin-top: 2em;">
                                <div>
                                    <img src="<?=url('/')?>/public/images/icon_svg/time_green.svg">
                                </div>
                                &nbsp;
                                <div style="margin-left: 0.8em;">Penggunaan hingga <br>24 Jam per hari</div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1 text-dark" style="text-align: right; font-size: 0.7em;">Mulai Dari...</div>
                            <div class="text-dark"
                                style="text-align: right; font-weight: 600; line-height: 0.8em; font-size: 0.85em;">Rp.
                                {{$row->harga_per_hari}}</div>
                            <div class="text-dark" style="text-align: right; font-size: 0.7em;">/hari</div>
                            <div style="display: flex; justify-content: flex-end;">
                                <a href="{{url()->current()}}/{{$row->no_plat}}"
                                    style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 0.7em; border-radius: 2em;">Detail</a>
                            </div>
                        </div>
                    </div>
                    <hr style="width: 100%; margin:0;">
                    <div class="font-weight-bold text-dark"
                        style="font-size: 1.0em; margin-top: 0.7em; text-align: right;">
                        {{$row->no_plat}}
                    </div>

                </div>
            </div>
            @endforeach
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
