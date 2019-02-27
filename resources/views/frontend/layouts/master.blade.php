<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,400i,600,700|Open+Sans:300,400,600,700,800,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/web/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/assets/web/css/style.css" type="text/css" />

    <link rel="stylesheet" href="/assets/web/css/swiper.css" type="text/css" />

    <!-- Business Demo Specific Stylesheet -->
    <link rel="stylesheet" href="/assets/web/css/business.css" type="text/css" />
    <link rel="stylesheet" href="/assets/web/css/fonts.css" type="text/css" />
    <!-- / -->

    <link rel="stylesheet" href="/assets/web/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/assets/web/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/assets/web/css/magnific-popup.css" type="text/css" />



    <link rel="stylesheet" href="/assets/web/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!-- Theme Color
    ============================================= -->
    <link rel="stylesheet" href="/assets/web/css/colors.css" type="text/css" />
    <!-- Start of  Zendesk Widget script -->
    <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=cbbabc04-0ec0-49ba-8c6e-e6bf79907734"> </script>
    <!-- End of  Zendesk Widget script -->
    @yield('css')

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">


    <!-- Header
    ============================================= -->
    <header id="header" class="full-header clearfix">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="/" class="standard-logo" data-dark-logo="/uploads/ByPoly-logo-header.png"><img src="/uploads/ByPoly-logo-header.png" alt="ByPoly Logo"></a>
                    <a href="/" class="retina-logo" data-dark-logo="/uploads/ByPoly-logo-header.png"><img src="/uploads/ByPoly-logo-header.png" alt="ByPoly Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul>
                        <li><a href="{{route('home')}}"><div>Anasayfa</div></a></li>
                        <li><a href="{{route('about')}}"><div>Kurumsal</div></a></li>
                        <li class="dropdown-menu-right"><a href="{{route('services')}}"><div>Hizmetler</div></a>
                            <div class="mega-menu-content style-1">
                                <ul class="mega-menu-column col-lg-6">
                                    @foreach($menuhizmetler as $menhiz)
                                        <li class="mega-menu-title"><a href="{{route('service_detail',$menhiz->slug)}}"><div>{{$menhiz->name}}</div></a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </li>
                        <li><a href="{{route('projects')}}"><div>Projelerimiz</div></a></li>
                        <li><a href="{{route('video_gallery')}}"><div>Video Galeri</div></a></li>
                    <!--<li><a href="{{route('blog')}}"><div>Blog</div></a>-->
                        <li><a href="{{route('contact')}}"><div>İletişim</div></a>
                    </ul>

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header>
    <!-- #header end -->

    @yield('content')

    <footer id="footer" class="dark">
        <div>
            <a href="{{route('contact')}}" class="button button-full center tright">
                <div class="container clearfix">
                    Su Yalıtımı İhtiyacınız Mı Var? <strong>Hemen Teklif Al</strong> <i class="icon-caret-right" style="top:4px;"></i>
                </div>
            </a>
        </div>
        <div class="container clearfix">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap clearfix">
                <div class="col_one_fourth">
                    <img src="/uploads/ByPoly-logo-header.png" alt="By Poly Logo" width="300" style="margin-top: -30px">

                </div>


                <div class="col_one_fourth">
                    <div class="widget widget_links clearfix">
                        <h4>Hizmetler</h4>
                        <ul>
                            @foreach($menuhizmetler as $menhiz)
                            <li><a href="{{route('service_detail',$menhiz->slug)}}">{{$menhiz->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col_two_fourth col_last">
                    <div class="col_one_fourth">
                        <div class="widget widget_links clearfix">
                            <div class="fb-page" data-href="https://www.facebook.com/bypolyisolation/" data-tabs="events" data-width="200" data-height="75" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/bypolyisolation/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bypolyisolation/">Bypoly</a></blockquote></div>
                        </div>
                    </div>

                    <div class="col_one_fourth col_last">
                        <div class="widget widget_links clearfix">
                            <div style="background: url('/assets/web/images/world-map.png') no-repeat center center; background-size: 100%;">
                                <address>
                                    <strong>Adres:</strong><br>
                                    {{ $ayarlar->address }}
                                </address>
                                <abbr title="Telefon Numarası"><strong>Telefon:</strong></abbr> {{ $ayarlar->phone_fixed ?? '' }}<br>
                                <abbr title="Mobil Telefon Numarası"><strong>Telefon (Mobil):</strong></abbr> {{ $ayarlar->phone_mobile ?? '' }}<br>
                                <abbr title="Email Adresi"><strong>Email:</strong></abbr> {{ $ayarlar->email ?? '' }}
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="line line-sm"></div>

                    <div class="col_two_third">
                        <small class="t300" style="color: #AAA">Copyrights &copy; 2019 All Rights Reserved by Proje Yenilik</small>
                    </div>
                    <div class="col_one_third col_last">
                        <div class="fright clearfix">
                            <a  href="https://facebook.com/{{ $ayarlar->facebook ?? '' }}" class="social-icon si-mini si-rounded si-colored si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="https://instagram.com/{{ $ayarlar->instagram ?? '' }}" class="social-icon si-mini si-rounded si-colored si-instagram">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>

                            <a href="https://youtube.com/{{ $ayarlar->youtube ?? '' }}" class="social-icon si-mini si-rounded si-colored si-youtube">
                                <i class="icon-youtube"></i>
                                <i class="icon-youtube"></i>
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </footer><!-- #footer end -->
    <!-- Cookie Notification Bar
            ============================================= -->
    <div id="cookie-notification" class="dark">
        <div class="container clearfix center">
            Çerez Kullanımı
            Çerezler (cookie), ByPoly web sitesini ve hizmetlerimizi daha etkin bir şekilde sunmamızı sağlamaktadır.
            Çerezlerle ilgili detaylı bilgi için <a href="#">Gizlilik Politikamızı</a> ziyaret edebilirsiniz.
            <a href="#" class="cookie-accept cookie-noti-btn fcenter btn btn-warning btn-sm">Kapat</a>
        </div>
    </div>
</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
{{--<div id="gotoTop" class="icon-angle-up"></div>--}}

<!-- External JavaScripts
============================================= -->
<script src="/assets/web/js/jquery.js"></script>
<script src="/assets/web/js/plugins.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="/assets/web/js/functions.js"></script>

<script>
    // Owl Carousel Scripts
    $('#oc-features').owlCarousel({
        items: 1,
        margin: 60,
        nav: true,
        navText: ['<i class="icon-line-arrow-left"></i>','<i class="icon-line-arrow-right"></i>'],
        dots: false,
        stagePadding: 30,
        responsive:{
            768: { items: 2 },
            1200: { stagePadding: 200 }
        },
    });
</script>

<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v3.2"></script>
@yield('js')
<!-- Footer Scripts
============================================= -->




</body>
</html>
