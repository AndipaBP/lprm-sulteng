@extends('layout/mobile/home')

@section('title')

@endsection

@section('header-scripts')
<style type="text/css">
    .banner {
        max-width: 480px;
        width: 100%;
        margin: 0px auto;
        padding: 4em 0em 4em 0em;

    }

    .class {}

    .header {
        background: #ff006e;
        position: fixed;
        width: 100%;
        top: 0px;
        left: 0px;
        right: 0px;
        z-index: 11;
    }

    .card-mall {
        background: white;
        box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;
        border-radius: 1.5em;
        margin-bottom: 1em;
    }

    .row-mall {
        background: white;
        margin-bottom: 1em;
        width: 100%;
    }

    .kategori {
        padding: 0.8em 0em 1em 0em;
        display: flex;
        position: relative;
        top: -12em;
        margin-bottom: -2em;
        z-index: 2;
        overflow-y: visible;
        margin: 0px;
        overflow-x: scroll;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* Internet Explorer 10+ */
    }


    .kategori::-webkit-scrollbar {
        /* WebKit */
        width: 0;
        height: 0;
    }



    .product {
        overflow-y: visible;
        overflow-x: auto;
    }

    .nama-kategori {
        padding: 0.5em 0.5em 0.5em 0.5em;
        display: flex;
        justify-content: space-around;
    }

    .sosmed>img {
        margin: 0px 0.6em 0px 0.6em !important;
    }

    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
        padding-bottom: 0px;
        background-color: transparent;
    }

    .footer-mall-menu {
        background: white;
        border-radius: 3em;
        margin-bottom: 0.5em;
    }



    .homepage {
        padding: 0px;
    }

    .slider {
        display: flex;
        overflow-y: visible;
        margin: 0px;
        overflow-x: scroll;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* Internet Explorer 10+ */
    }

    .slider::-webkit-scrollbar {
        /* WebKit */
        width: 0;
        height: 0;
    }

    .slider-toko {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin: 0em 0em 0em 0.5em;
        width: 8.5em;
    }

    .slider-toko img {
        width: 8.5em;
        height: 7.5em;
        object-fit: cover;
        border-top-left-radius: 1em;
        border-top-right-radius: 1em;
    }

    .slider-toko>div {
        height: 6.3em;
        border-bottom-left-radius: 1em;
        border-bottom-right-radius: 1em;
    }

    .star-rating {
        color: #efac00;
    }

    .star-no-rating {
        color: #c1c3be;
    }


    /*LPRM*/
    .menu-pesan {
        width: 100%;
        color: white;
        display: flex;
        justify-content: center;
    }

    .menu-pesan div {
        border: 2px solid white;
        padding: 0.5em 1em;
        border-radius: 0.5em;
        margin: 0em 0.5em;
    }

    input {
        color: white;
    }

    body {
        background: #F2EFEA !important;
    }

</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: #101a19;">
    <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
        <a style="padding-left: 1.5em;" href="{{url('/mobile/mobil')}}">
            <img src="<?=url('/')?>/public/images/back_white.svg" style="width: 100%;">
        </a>
        <a id="defaultheader_logo" title="LPRM Sulteng" style="height:33px; display: flex;" href="{{url('/mobile')}}">
            <img src="<?=url('/')?>/public/images/logo/logo.svg" style="height: 100%;">
            <div style="display: flex; justify-content: center;">
                <img src="<?=url('/')?>/public/images/logo/logo_text.svg" style="width: 80%;">
            </div>
        </a>
        <div style="padding-right: 1.5em;">
            <img src="<?=url('/')?>/public/images/icon_svg/3-menu-bar.svg" style="width: 100%;" hidden>
        </div>

    </div>
</header>



<main id="homepage" class="homepage" style="background:#F2EFEA;">
    <div class="row-mall" style="padding: 0.7em 1.2em 1.2em 1.2em; margin-top: 5em; background: #F2EFEA;">
        <div>
            <div
                style='height: 12em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/tipe_mobil/{{$tipe_mobil->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover;'>
                <div
                    style="padding-left: 0.8em; text-align: left; color: white;width: 100%; display: flex; justify-content: space-between; position: relative;">
                    <span style="font-weight: 500;  font-size: 1.3em;">{{$tipe_mobil->nama}}</span>
                </div>
                <div style="display: flex; width: 100%; margin-bottom: 0.8em;">
                    <div
                        style="font-size: 0.7em; color: white; padding-left: 1.3em; width: 100%; display: flex; align-items: center;">
                        <span style="padding-top: 0.2em;">{{$tipe_mobil->merk_mobil->nama}}</span>
                    </div>
                </div>
            </div>

        </div>
        <div>
            @foreach($mobil as $row)
            <div
                style='margin-bottom: 1em; background: white; box-shadow: 1px 1px 11px #DAD5CE; border-radius: 12px; padding: 1em 1.5em; background-size: cover;'>
                <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                    <div>
                        <div style="font-size: 0.85em; font-weight: 600;">{{$row->rental->nama}}</div>
                        <div style="font-weight: 600; font-size: 0.8em;">Kota Palu</div>
                        <div style="padding: 0; margin: 0; font-size: 0.7em; line-height: 1.5em; margin-top: 0.5em;">
                            <i class="fas fa-star star-rating"></i>
                            <i class="fas fa-star star-rating"></i>
                            <i class="fas fa-star star-rating"></i>
                            <i class="fas fa-star star-rating"></i>
                            <i class="far fa-star star-rating"></i>
                        </div>
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
                        <div class="mb-1" style="text-align: right; font-size: 0.7em;">Mulai Dari...</div>
                        <div style="text-align: right; font-weight: 600; line-height: 0.8em; font-size: 0.85em;">Rp.
                            {{$row->harga_per_hari}}</div>
                        <div style="text-align: right; font-size: 0.7em;">/hari</div>
                        <div style="display: flex; justify-content: flex-end;">
                            <a href="{{url()->current()}}/{{$row->no_plat}}"
                                style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 0.7em; border-radius: 2em;">Pilih</a>
                        </div>
                        <div style="width: 100%; display: flex;justify-content: flex-end;">
                            <img src="<?=url('/')?>/public/images/rental.svg">
                        </div>
                    </div>
                </div>
                <hr style="width: 100%; margin:0;">
                <div class="font-weight-bold" style="font-size: 1.0em; margin-top: 0.7em; text-align: right;">
                    {{$row->no_plat}}
                </div>
            </div>
            @endforeach

        </div>
    </div>
    </div>
</main>

<div class="wrapper" style="background: #1c2645; position: relative; z-index: -1">
    <div class="container-mall" style="padding-bottom: 3em;">
        <div style="padding-top: 2em; text-align: center; color: white;">
            <p style="font-weight: 700;">Alamat</p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper vitae proin fames vulputate integer nulla
            amet. Donec turpis.
        </div>
        <div style="padding-top: 2em; text-align: center; color: white;">
            <p style="font-weight: 700;">Connect with us on social media</p>
            <div class="sosmed">
                <img src="<?=url('/')?>/public/images/home/about/facebook.svg" style="width: 2.2em;">
                <img src="<?=url('/')?>/public/images/home/about/youtube.svg" style="width: 2.2em;">
                <img src="<?=url('/')?>/public/images/home/about/instagram.svg" style="width: 2.2em;">
                <img src="<?=url('/')?>/public/images/home/about/twitter.svg" style="width: 2.2em;">
            </div>
            <div><br>
                <a href="<?=url('/')?>" style="margin: 0em 0.3em 0em 0.3em;">About Us</a>
                <a href="<?=url('/')?>" style="margin: 0em 0.3em 0em 0.3em;">Privacy & Policy</a>
            </div>
            <div>
                Copyright&nbsp;&copy;&nbsp;<script>
                    document.write(new Date().getFullYear());

                </script>&nbsp;CV. Kaili Nusantara Production
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
@endsection
