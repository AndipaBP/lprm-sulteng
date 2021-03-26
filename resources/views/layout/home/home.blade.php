<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="LPRM SULTENG">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="img/favicon.ico" rel="shortcut icon" />

    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?=url('/')?>/public/template/home/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=url('/')?>/public/template/home/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?=url('/')?>/public/template/home/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?=url('/')?>/public/template/home/css/slicknav.min.css" />

    <link rel="icon" type="image/png" sizes="60x60" href="{{asset('public/images/logo/logo.svg')}}">
    <link rel="stylesheet" href="<?=url('/')?>/public/template/home/css/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    @yield('header-scripts')


    <style type="text/css">
        .main-menu li a {
            padding: 0px;
        }

        .site-logo {
            padding: 0px;
        }

        .hs-item {
            background: #101A19 !important;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

    </style>
</head>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header-section clearfix" style="background: #101A19;">
        <a href="{{url('/')}}" class="site-logo" style="padding: 1em 0.6em;">
            <img src="<?=url('/')?>/public/images/logo/logo.svg" alt="">
            <img src="<?=url('/')?>/public/images/logo/logo_text.svg" alt="">
        </a>
        <ul class="main-menu" style="height: 100%; padding: 1.5em 0em 1em 0em;">
            <li><a class="font-weight-bold" href="<?=url('/')?>/daftar-rental">Daftar Rental</a></li>
            <li><a class="font-weight-bold" href="<?=url('/')?>/daftar-mobil">Daftar Mobil</a></li>
            <li><a class="font-weight-bold" href="<?=url('/')?>/tentang-kami">Tentang Kami</a></li>
            <li><a class="font-weight-bold" href="<?=url('/')?>/login">Masuk</a></li>
        </ul>
    </header>

    @yield('content')


    @yield('modal')

    <div class="modal fade" id="modal-pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                        <p style="color: black !important; text-align: center;">Silahkan Download Terlebih Dahulu
                            <br>Aplikasi <b>Kitapura</b><span style="font-style:italic; ">mall</span>.</p>
                        <h3 style="font-weight: 600; color: black !important;"><a href="https://play.google.com/store/apps/details?id=com.kailinusantara.kitapuramall" style="color:black;">Download Disini</a></h3>
                        <a href="https://play.google.com/store/apps/details?id=com.kailinusantara.kitapuramall" style="text-align:center;"><img src="<?=url('/')?>/public/images/home/download_playstore.svg" style="width: 70%;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer class="footer-section" style="margin-top: 0;background: #101A19 !important;">
        <div class="container" style="background: #101A19 !important;">
            <div class="row">
                <div class="col-xl-6 col-lg-7 order-lg-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="footer-widget">
                                <h2>About us</h2>
                                <ul>
                                    <li><a href="">Tentang Kami</a></li>
                                    <li><a href="">Struktur Organisasi</a></li>
                                    <li><a href="">Rental Kami</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-widget">
                                <a href="https://play.google.com/store/apps/details?id=com.kailinusantara.kitapuramall">
                                    <img src="<?=url('/')?>/public/images/home/download_playstore.svg"
                                        style="width: 100%;">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 order-lg-1"
                    style="display: flex; justify-content: flex-start; flex-direction: column;">
                    <div class="copyright">
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());

                        </script> All rights reserved | by <a href="https://colorlib.com" target="_blank">Kaili
                            Nusantara Production</a>
                    </div>
                    <div class="social-links">
                        <a href=""><i class="fab fa-instagram" style="font-size: 2em;"></i></a>
                        <a href=""><i class="fab fa-whatsapp" style="font-size: 2em;"></i></a>
                        <a href=""><i class="fab fa-facebook" style="font-size: 2em;"></i></a>
                        <a href=""><i class="fab fa-twitter" style="font-size: 2em;"></i></a>
                        <a href=""><i class="fab fa-youtube" style="font-size: 2em;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="<?=url('/')?>/public/template/home/js/jquery-3.2.1.min.js"></script>
    <script src="<?=url('/')?>/public/template/home/js/bootstrap.min.js"></script>
    <script src="<?=url('/')?>/public/template/home/js/jquery.slicknav.min.js"></script>
    <script src="<?=url('/')?>/public/template/home/js/owl.carousel.min.js"></script>
    <script src="<?=url('/')?>/public/template/home/js/mixitup.min.js"></script>
    <script src="<?=url('/')?>/public/template/home/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @yield('footer-scripts')

</body>

</html>
