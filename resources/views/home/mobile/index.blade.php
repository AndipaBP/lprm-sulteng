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
        color: #efff3b;
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

</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: #101a19;">
    <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
        <a id="defaultheader_logo" title="Kitabisa" style="margin-left: 1.5em; height:33px; display: flex;"
            href="{{url('/mobile')}}">
            <img src="<?=url('/')?>/public/images/logo/logo.svg" style="height: 100%;">
            <div style="display: flex; justify-content: center;">
                <img src="<?=url('/')?>/public/images/logo/logo_text.svg" style="width: 80%;">
            </div>
        </a>
        <div style="padding-right: 1.5em;">
            <img src="<?=url('/')?>/public/images/icon_svg/3-menu-bar.svg" style="width: 100%;">
        </div>
    </div>
</header>

<div class="wrapper"
    style="background: #101a19; position: relative; z-index: -1; border-bottom-right-radius: 7%; border-bottom-left-radius: 7%;">
    <div class="banner" style="padding: 5em 0em 7em 0.5em;">
        <img src="<?=url('/')?>/public/images/cover.svg" style="width: 100%;">
    </div>
</div>

<main id="homepage" class="homepage" style="background:white;">
    <div class="card-mall kategori"
        style="margin: 0px 16px 1em; background: #101A19 !important; box-shadow: 1px 1px 18px #070C0B; display: flex; flex-direction: column;">
        <a href="{{url('/mobile/mobil')}}"
            style="border: none; background: #FF435E; text-align: center; color: white; width: 100%; padding: 0.7em; font-size: 1em;">Cari Mobil</a>

    </div>

    <div class="row-mall" style="padding: 0.7em 1.2em 1.2em 1.2em; margin-top: -12em;">
        <div style="font-size: 1.3em; font-weight: 1000; margin-bottom: 0.5em;">Info dan Tips</div>
        <div>
            <div
                style='height: 13em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 42.86%, #111B1A 100%), url("<?=url('/')?>/public/images/tips/clean_trip.jpg"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px;'>
                <div
                    style="padding-top: 5em; padding-left: 0.8em; text-align: left; color: white; font-weight: 500; font-size: 1.3em;">
                    Clean Trip</div>
                <div style="display: flex;">
                    <div style="font-size: 0.8em; color: white; padding-left: 1.5em; width: 75%;">beberapa penyedia kami
                        telah mengambil langkah higienis untuk keamanan anda</div>
                    <div
                        style="width: 20%; color: white; font-size: 0.8em; text-align: right; text-decoration: underline;">
                        <br>selengkapnya</div>
                </div>
            </div>
            <div
                style='height: 13em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 42.86%, #111B1A 100%), url("<?=url('/')?>/public/images/tips/clean_trip.jpg"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px;'>
                <div
                    style="padding-top: 5em; padding-left: 0.8em; text-align: left; color: white; font-weight: 500; font-size: 1.3em;">
                    Clean Trip</div>
                <div style="display: flex;">
                    <div style="font-size: 0.8em; color: white; padding-left: 1.5em; width: 75%;">beberapa penyedia kami
                        telah mengambil langkah higienis untuk keamanan anda</div>
                    <div
                        style="width: 20%; color: white; font-size: 0.8em; text-align: right; text-decoration: underline;">
                        <br>selengkapnya</div>
                </div>
            </div>
            <div style="text-align: right; width: 100%;"><a href="<?=url('/')?>" style="color: black;">Lihat lebih
                    banyak</a></div>

        </div>
    </div>
    <div class="row-mall" style="padding: 0.7em 1.2em 1.2em 1.2em; margin-top: -2em;">
        <div style="font-size: 1.3em; font-weight: 1000; margin-bottom: 0.5em;">Destinasi Favorit</div>
        <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
            <div
                style='height: 11em; width:48%; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 42.86%, #111B1A 100%), url("<?=url('/')?>/public/images/wisata/danau_lindu.jpg"); border-radius: 12px; display: flex;align-items: flex-end; background-size: cover;'>
                <div
                    style="padding-left: 0.8em; line-height: 1.2em; padding-bottom: 1em; text-align: left; color: white; font-weight: 500; font-size: 1.3em;">
                    Danau Lindu</div>
            </div>
            <div
                style='height: 11em; width:48%; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 42.86%, #111B1A 100%), url("<?=url('/')?>/public/images/wisata/bambarano.jpg"); border-radius: 12px; display: flex;align-items: flex-end; background-size: cover;'>
                <div
                    style="padding-left: 0.8em; line-height: 1.2em; padding-bottom: 1em; text-align: left; color: white; font-weight: 500; font-size: 1.3em;">
                    Pantai Bambarano</div>
            </div>
            <div
                style='height: 11em; width:48%; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 42.86%, #111B1A 100%), url("<?=url('/')?>/public/images/wisata/tanjung_karang.jpg"); border-radius: 12px; display: flex;align-items: flex-end; background-size: cover;'>
                <div
                    style="padding-left: 0.8em; line-height: 1.2em; padding-bottom: 1em; text-align: left; color: white; font-weight: 500; font-size: 1.3em;">
                    Pantai Tanjung Karang</div>
            </div>
            <div
                style='height: 11em; width:48%; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 42.86%, #111B1A 100%), url("<?=url('/')?>/public/images/wisata/kaluku.jpg"); border-radius: 12px; display: flex;align-items: flex-end; background-size: cover;'>
                <div
                    style="padding-left: 0.8em; line-height: 1.2em; padding-bottom: 1em; text-align: left; color: white; font-weight: 500; font-size: 1.3em;">
                    Pantai Kaluku</div>
            </div>

        </div>
        <div style="text-align: right; width: 100%;"><a href="<?=url('/')?>" style="color: black;">Lihat lebih
                banyak</a></div>
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
