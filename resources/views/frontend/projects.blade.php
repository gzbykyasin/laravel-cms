@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Projeler</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/projeler.html')}}">Projeler</a></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap nobottompadding">

            <div class="container clearfix">

                <!-- Portfolio Filter
                ============================================= -->
                <ul id="portfolio-filter" class="portfolio-filter clearfix" data-container="#portfolio">
                    <li class="activeFilter"><a href="#" data-filter="*">Tüm Projeler</a></li>
                    @foreach($hizmetler as $hizmet)
                    <li><a href="#" data-filter=".{{$hizmet->slug}}">{{$hizmet->name}}</a></li>
                    @endforeach
                </ul><!-- #portfolio-filter end -->

                <div id="portfolio-shuffle" class="portfolio-shuffle" data-container="#portfolio">
                    <i class="icon-random"></i>
                </div>

                <div class="clear"></div>

            </div>

            <!-- Portfolio Items
            ============================================= -->
            <div id="portfolio" class="portfolio grid-container portfolio-6 portfolio-full portfolio-nomargin clearfix">
                @foreach($projeler as $proje)
                <article class="portfolio-item {{$proje->getService->slug}}">
                    <div class="portfolio-image">
                        <a href="#">
                            <img src="{{url('/uploads/proje/'.$proje->predefined)}}" alt="{{$proje->description}}" width="150">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc">
                                <h3><a href="{{url('/uploads/proje/'.$proje->predefined)}}">{{$proje->name}}</a></h3>
                            </div>
                            <a href="{{url('/uploads/proje/'.$proje->predefined)}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div><!-- #portfolio end -->

        </div>

    </section><!-- #content end -->
@endsection

@section('js')

@endsection
@section('css')
    <title>By Poly Sprey İzolasyon Sistemleri | Projeler</title>
    <meta name="description" content="ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz">
    <meta name="keywords" content="Sprey polyurea teras kaplama,polyurea Nedir,polyurea,polyurea coating,su yalıtım,sprey polyurea,polyurea kaplama">
@endsection
