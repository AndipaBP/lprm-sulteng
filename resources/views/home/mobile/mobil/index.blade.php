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
        <a id="defaultheader_logo" title="Kitabisa" style="margin-left: 1.5em; height:33px; display: flex;" href="{{url('/mobile')}}">
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
        <div class="menu-pesan">
            <div>Tanpa Sopir</div>
            <div style="border: 2px solid #FF435E;">Dengan Sopir</div>
        </div>
        <form action="<?=url('/')?>/daftar-mobil" style="color: white; padding: 1em 1.5em;">
            <div class="form-group">
                <label>Kota Penjemputan</label>
                <div style="background: #131F1E; box-shadow: 1px 1px 11px #000000; display: flex;">
                    <div style="display: flex; align-items: center; margin-left: 1em;">
                        <img src="<?=url('/')?>/public/images/icon_svg/maps_pink.svg">
                    </div>
                    <input type="text" name="kota_penjemputan" value="Kota Palu"
                        style="background: #131f1e; border: none; padding: 1em;">
                </div>

            </div>
            <div class="form-group">
                <label>Tanggal Mulai Rental</label>
                <div style="background: #131F1E; box-shadow: 1px 1px 11px #000000; display: flex;">
                    <div style="display: flex; align-items: center; margin-left: 1em;">
                        <img src="<?=url('/')?>/public/images/icon_svg/calender_pink.svg" style="width: 100%;">
                    </div>
                    <input type="text" name="kota_penjemputan" value="Kota Palu"
                        style="background: #131f1e; border: none; padding: 1em;">
                </div>

            </div>
            <div class="form-group">
                <label>Tanggal Mulai Rental</label>
                <div style="background: #131F1E; box-shadow: 1px 1px 11px #000000; display: flex;">
                    <div style="display: flex; align-items: center; margin-left: 1em;">
                        <img src="<?=url('/')?>/public/images/icon_svg/calender_check.svg" style="width: 100%;">
                    </div>
                    <input type="text" name="kota_penjemputan" value="Kota Palu"
                        style="background: #131f1e; border: none; padding: 1em;">
                </div>
            </div>
            <button
                style="border: none; background: #FF435E; text-align: center; color: white; width: 100%; padding: 0.7em; font-size: 1em;"
                type="submit">Cari</button>
        </form>
    </div>

    <div class="row-mall" style="padding: 0.7em 1.2em 1.2em 1.2em; margin-top: -12em;">
        <!-- <div style="font-size: 1.4em; font-weight: 1000; margin-bottom: 1em;">Tipe Mobil </div> -->
        <!-- <div style="font-size: 0.9em; font-weight: 1000; margin-bottom: 1em;">Kamis, 18 Feb 2020 09:00</div> -->
        <div style="font-size: 1.4em; font-weight: 1000; margin-bottom: 0em;">Mobil di Kota Palu</div>
        <div style="font-size: 0.9em; font-weight: 1000; margin-bottom: 1em;">Kamis, 18 Feb 2020 09:00</div>
        <div>
            @foreach($tipe as $row)
            @if($row->mobil->count() != '0')
            <div
                style='height: 12em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/tipe_mobil/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover;'>
                <div
                    style="padding-left: 0.8em; text-align: left; color: white;width: 100%; display: flex; justify-content: space-between; position: relative;">
                    <div style="font-weight: 500;  font-size: 1.3em;">{{$row->nama}} <span
                            style="font-size: 0.5em; font-weight: 500;">{{$row->merk_mobil->nama}}</span></div>
                    <div style="position: absolute; right: 0; bottom: -1em;">
                        <div style="text-align: right; width: 100%; color: white;">
                            @if($row->mobil->count() == '0')

                            <div style="font-size: 1.1em; font-weight: 500;">Akan Datang...</div>
                            @else
                            <div style="line-height: 0.7em; font-size: 0.9em;">Mulai Dari..</div>
                            <div style="font-size: 1.1em; font-weight: 500;">Rp. {{$row->mobil->min('harga_per_hari')}}
                            </div>
                            <div style="font-size: 0.7em; line-height: 1em;">/hari</div>
                            @endif
                        </div>

                        <div style="display: flex; justify-content:flex-end; margin-top: 0.2em;">
                            <a href="{{url()->current()}}/{{strtolower($row->nama)}}"
                                style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 0.9em; border-radius: 2em;">Pilih</a>
                        </div>
                    </div>
                </div>
                <div style="display: flex; width: 100%; margin-bottom: 0.8em;">
                    <div
                        style="font-size: 0.7em; color: white; padding-left: 1.3em; width: 100%; display: flex; align-items: center;">
                        <img src="<?=url('/')?>/public/images/icon_svg/kapasitas.svg" style="width: 1em;">&nbsp;<span
                            style="padding-top: 0.2em;">{{$row->mobil->count()}}
                            Mobil</span>&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
            @endif
            @endforeach
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
