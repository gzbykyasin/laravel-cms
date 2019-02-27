@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Video Galeri</h1>
            <span>ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/video-galeri.html')}}">Video Galeri</a></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                @foreach($videolar as $video)
                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix">

                    <h3>{{$video->name}}</h3>

                    <iframe width="560" height="315" src="http://www.youtube.com/embed/{{$video->video}}" frameborder="0" allowfullscreen></iframe>

                    <div class="divider"><i class="icon-circle"></i></div>


                </div><!-- .postcontent end -->
                @endforeach

            </div>

        </div>

    </section><!-- #content end -->
@endsection

@section('js')

@endsection
@section('css')
    <title>By Poly Sprey İzolasyon Sistemleri | Video Galeri</title>
    <meta name="description" content="ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz">
    <meta name="keywords" content="Sprey polyurea teras kaplama,polyurea Nedir,polyurea,polyurea coating,su yalıtım,sprey polyurea,polyurea kaplama">
@endsection
