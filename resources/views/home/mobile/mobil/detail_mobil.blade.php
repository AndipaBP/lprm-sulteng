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

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />

@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: #101a19;">
    <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
        <a style="padding-left: 1.5em;" href="{{url()->previous()}}">
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
    <div class="row-mall" style="padding: 5.5em 1.2em 1.2em 1.2em;background: white;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @if($mobil->foto_mobil->count() == '0')
                <div class="swiper-slide">
                    <div
                        style='height: 15em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/tipe_mobil/{{$mobil->tipe_mobil->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                    </div>
                </div>

                @else
                @foreach($mobil->foto_mobil as $row)
                <div class="swiper-slide">
                    <div
                        style='height: 15em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/upload/rental/{{$mobil->rental->id}}/img/mobil/{{$mobil->id}}/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover; width: 100%;'>
                    </div>
                </div>

                @endforeach

                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div style="font-weight: 600; font-size: 1.2em;">{{$mobil->no_plat}}</div>
        <div class="mb-2" style="font-weight: 600; font-size: 1.2em;">{{$mobil->tipe_mobil->nama}} -
            {{$mobil->tipe_mobil->merk_mobil->nama}}</div>

        <div style="font-size: 0.7em; color: white; width: 100%; display: flex; align-items: center; color: #959595;">
            <img src="<?=url('/')?>/public/images/icon_svg/kapasitas_pink.svg" style="width: 1em;">&nbsp;<span
                style="padding-top: 0.2em;">{{$mobil->kapasitas}} Orang</span>&nbsp;&nbsp;&nbsp;
            <img src="<?=url('/')?>/public/images/icon_svg/bagasi_pink.svg" style="width: 1.2em;">&nbsp;<span
                style="padding-top: 0.2em;">{{$mobil->kapasitas}} Bagasi</span>
        </div>
        <div style="font-size: 0.7em; width: 100%; display: flex; align-items: center; color: #959595;">
            <img src="<?=url('/')?>/public/images/icon_svg/car_pink.svg" style="width: 1em;">&nbsp;<span
                style="padding-top: 0.2em;">Tahun {{$mobil->tahun_mobil}} atau setelahnya</span>&nbsp;&nbsp;&nbsp;
        </div>
        <div style="font-size: 0.7em; color: #959595; margin-top: 1em;">Status</div>
        <div style="display: flex;">
            <div
                style="border: #FF435E; background: #FF435E; color: white; font-size: 0.7em; padding: 0.3em 1em; border-radius: 1em; margin-right: 0.5em;">
                {{$mobil->status}}</div>

        </div>

    </div>

    <div class="row-mall" style="padding: 1.2em 1.2em 1.2em 1.2em;background: white;">
        <div style="display: flex; align-items: center;">
            <div style="width: 20%;">
                <img src="<?=url('/')?>/public/images/rental.svg" style="width: 100%;">
            </div>
            <div style="width: 80%; padding-left: 0.5em;">
                <div style="font-size: 0.8em; line-height: 0.9em;">Disediakan Oleh</div>
                <div style="font-weight: 600;">{{$mobil->rental->nama}}</div>
                <div style="padding: 0; margin: 0; font-size: 0.7em; line-height: 1.5em; margin-top: 0em;">
                    <i class="fas fa-star star-rating"></i>
                    <i class="fas fa-star star-rating"></i>
                    <i class="fas fa-star star-rating"></i>
                    <i class="fas fa-star star-rating"></i>
                    <i class="far fa-star star-rating"></i>
                </div>
            </div>
        </div>
        <div style="background: #FF435E; padding: 0.3em; text-align: center; color: white; margin-bottom: 0.5em;">Lihat
            Review</div>
    </div>
    <div class="row-mall" style="padding: 1.2em 1.2em 1.2em 1.2em;background: white;">
        <div style="font-weight: 600; font-size: 1.1em;">Informasi Pemilik</div>
        <div style="font-size: 0.85em; font-weight: 600; margin-top: 0.5em;">Nama Pemilik : </div>
        <div style="margin-top: 0.5em; color: #828282; font-size: 0.85em;">{{$mobil->pemilik}}</div>
        <div style="font-size: 0.85em; font-weight: 600; margin-top: 0.5em;">Alamat Pemilik : </div>
        <div style="margin-top: 0.5em; color: #828282; font-size: 0.85em;">{{$mobil->alamat_pemilik}}</div>
        <hr>
        <div style="font-weight: 600; font-size: 1.1em;">Deskripsi</div>
        <div style="font-size: 0.85em; font-weight: 600; margin-top: 0.5em;">Sebelum Anda Pesan</div>
        <div style="margin-top: 0.5em; color: #828282; font-size: 0.85em;">- Pastikan Untuk membaca syarat rental</div>
        <div style="font-size: 0.85em; font-weight: 600; margin-top: 0.5em;">Setelah Anda Pesan</div>
        <div style="margin-top: 0.5em; color: #828282; font-size: 0.85em;">- Pengemudi harus melengkapi dokumen</div>
        <div style="font-size: 0.85em; font-weight: 600; margin-top: 0.5em;">Saat Pengambilan</div>
        <div style="margin-top: 0.5em; color: #828282; font-size: 0.85em;">- Bawa KTP, SIM A, dan Dokumen-Dokumen lain
            yang dibutuhkan oleh penyedia rental.</div>
        <div style="margin-top: 0.5em; color: #828282; font-size: 0.85em;">- Saat anda bertemu dengan staf rental, cek
            kondisi mobil dengan staf</div>
        <div style="margin-top: 0.5em; color: #828282; font-size: 0.85em;">- Setelah itu, baca dan tanda tangan
            perjanjian rental</div>
    </div>
    <div class="row-mall" style="padding: 1.2em 1.2em 1.2em 1.2em;background: white;">
        <div style="font-weight: 600; font-size: 1.1em;">Alamat Rental Mobil</div>
        <div style="font-weight: 600; font-size: 1.1em; margin-top: 0.8em;">{{$mobil->rental->kelurahan->kelurahan}},
            {{ucwords($mobil->rental->kelurahan->kecamatan->nama)}}, KOTA PALU</div>
        <div style="color: #828282; font-size: 0.85em;">{{$mobil->rental->alamat}}</div>
        <div
            style="background: #FF435E; padding: 0.3em; text-align: center; color: white; margin-bottom: 0.5em; margin-top: 1em;">
            Lihat Lokasi di Peta</div>

    </div>

    <div class="row-mall" style="padding: 2em 1.2em 2em 1.2em;background: white;">
        <div onclick="WhatsappMessage({{ $mobil->rental->nomor_hp }})"
            style=" cursor:pointer; background: #FF435E; padding: 0.3em; text-align: center; color: white;"><img
                src="<?=url('/')?>/public/images/icon_svg/whatsapp_white.svg" style="width: 1.3em;">&nbsp;Hubungi Via
            WhatsApp</div>
    </div>
</main>

@endsection

@section('footer-scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>

var isMobile = mobilecheck();

        function mobilecheck() {
            var check = false;
            (function (a) {
                if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
                    .test(a) ||
                    /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
                    .test(a.substr(0, 4))) check = true;
            })(navigator.userAgent || navigator.vendor || window.opera);
            return check;
        }

        function WhatsappMessage(id) {

            var apilink = 'http://';
            var phone = '+62' + id;
            var message = '';

            apilink += isMobile ? 'api' : 'web';
            apilink += '.whatsapp.com/send?phone=' + phone + '&text=' + encodeURI(message);

            window.open(apilink);
        }
        
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
