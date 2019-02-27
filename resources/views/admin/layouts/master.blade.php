<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ByPoly">
    <meta name="author" content="ProjeYenilik">

    <title>By Poly Sprey İzolasyon Sistemleri Yönetim Paneli</title>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="/assets/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="/assets/admin/css/animate.css" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="/assets/admin/css/style.css" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
      page. However, you can choose any other skin from folder css / colors .
   -->
    @yield('css')

    <link href="/assets/admin/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <!-- Top Navigation -->

    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">

            <!-- Logo -->
            <div class="top-left-part"><a class="logo" href="/admin"><img src="/uploads/byPoly-logo.png" alt="bypoly" width="150"/></a></div>
            <!-- /Logo -->
            <!-- This is for mobile view search and menu icon -->

            <!-- This is the message dropdown -->
            <ul class="nav navbar-top-links navbar-right pull-right">

                <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu mailbox animated bounceInDown">
                        <li>
                            <div class="drop-title">{{ count($formmesaj) }} adet form mesajınız var</div>
                        </li>
                        <li>
                            <div class="message-center">
                                @foreach($formmesaj as $msj)
                                <a href="#">
                                    <div class="user-img"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>{{$msj->name ?? ''}}</h5> <span class="mail-desc">{{$msj->phone ?? ''}}</span> <span class="time">{{date('d-m-Y',strtotime($msj->created_at))}}</span> </div>
                                </a>
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <a class="text-center" href="/admin/formlar"> <strong>Tüm Mesajlar</strong> <i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->

                <!-- /.Megamenu -->
                <li class="right-side-toggle"> <a class="waves-effect waves-light" href="/admin/ayarlar"><i class="ti-settings"></i></a></li>
                <li><a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a></li>
                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
                <!-- .Apps -->
                <li>
                    <a href="{{url('admin')}}">
                        <i class="fa fa-dashboard"></i>
                        <span class="hide-menu"> Dashboard
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/anasayfa')}}" class="waves-effect">
                        <i class="fa fa-home"></i>
                        <span class="hide-menu"> Anasayfa
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li> <a href="{{url('admin/anasayfa')}}">Düzenle</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/ayarlar')}}" class="waves-effect">
                        <i class="fa fa-cogs"></i>
                        <span class="hide-menu"> Ayarlar <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li> <a href="{{url('admin/ayarlar')}}">Düzenle</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/hizmet')}}" class="waves-effect">
                        <i class="fa fa-briefcase" ></i>
                        <span class="hide-menu"> Hizmetler <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('admin/hizmet')}}">Listele</a></li>
                        <li><a href="{{url('admin/hizmet/create')}}">Ekle</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/yazi')}}" class="waves-effect">
                        <i class="fa fa-folder "></i>
                        <span class="hide-menu"> Yazılar <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('admin/yazi')}}">Listele</a></li>
                        <li><a href="{{url('admin/yazi/create')}}">Ekle</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/galeri')}}" class="waves-effect">
                        <i class="fa fa-photo"></i>
                        <span class="hide-menu"> Galeriler <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('admin/galeri')}}">Listele</a></li>
                        <li><a href="{{url('admin/galeri/create')}}">Ekle</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/musteri')}}" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span class="hide-menu"> Müşteriler <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('admin/musteri')}}">Listele</a></li>
                        <li><a href="{{url('admin/musteri/create')}}">Ekle</a></li>
                        <li><a href="{{url('admin/pdf')}}">Müşteri PDF Listele</a></li>
                        <li><a href="{{url('admin/pdf/create')}}">Müşteri PDF Ekle</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/video')}}" class="waves-effect">
                        <i class="fa fa-youtube" ></i>
                        <span class="hide-menu"> Video Galeri <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('admin/video')}}">Listele</a></li>
                        <li><a href="{{url('admin/video/create')}}">Ekle</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/proje')}}" class="waves-effect">
                        <i class="fa fa-tasks" ></i>
                        <span class="hide-menu"> Projeler <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('admin/proje')}}">Listele</a></li>
                        <li><a href="{{url('admin/proje/create')}}">Ekle</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/kategori')}}" class="waves-effect">
                        <i class="fa fa-tag"></i>
                        <span class="hide-menu"> Kategoriler <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('admin/kategori')}}">Listele</a></li>
                        <li><a href="{{url('admin/kategori/create')}}">Ekle</a></li>
                       {{-- <li><a href="{{url('admin/etiket')}}">Etiket Listele</a></li>
                        <li><a href="{{url('admin/etiket/create')}}">Etiket Ekle</a></li>--}}
                        {{--fa-dashboard--}}
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/formlar')}}" class="waves-effect">
                        <i class="fa fa-eye" ></i>
                        <span class="hide-menu"> Form Mesajları<span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('admin/formlar')}}">Listele</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('logout')}}">
                        <i class="fa fa-power-off"></i>
                        <span class="hide-menu"> Çıkış Yap
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                </li>
                <!-- /.Apps -->
            </ul>
        </div>
    </div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- /.Side panel -->

             @yield('content')

        </div>

    </div>

</div>
        <!-- /#wrapper -->
<!-- jQuery -->
<script src="/assets/admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/assets/admin/bootstrap/dist/js/tether.min.js"></script>
<script src="/assets/admin/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/admin/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Sidebar menu plugin JavaScript -->
<script src="/assets/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--Slimscroll JavaScript For custom scroll-->
<script src="/assets/admin/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="/assets/admin/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/assets/admin/js/custom.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('js')
<script src="/assets/admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
