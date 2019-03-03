@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Kategoriler</h1>
            <span>ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/kategori')}}">Kategoriler</a></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">
                @foreach($kategoriler as $key=>$kategori)
                <div class="col_one_third">
                    <div class="feature-box media-box">
                        <div class="fbox-media">
                            <img src="{{url('/uploads/kategori/'.$kategori->predefined ?? '')}}" alt="{{$kategori->title ?? ''}}">
                        </div>
                        <div class="fbox-desc">
                            <h3>{{$kategori->title ?? ''}}</h3>
                            <p>{{ $kategori->description }}</p>
                            <a href="/kategori/{{$kategori->slug ?? ''}}.html" class="button button-small button-circle button-border button-amber">Devamı</a>
                        </div>
                    </div>
                </div>
                @if(($key+1)%3==0)
                    <div class="clearfix" style="margin-bottom: 40px;"></div>
                @endif
                @endforeach
            </div>
        </div>

    </section><!-- #content end -->

@endsection

@section('js')

@endsection
@section('css')
    <title>By Poly Sprey İzolasyon Sistemleri | Kategoriler</title>
    <meta name="description" content="ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz">
    <meta name="keywords" content="Sprey polyurea teras kaplama,polyurea Nedir,polyurea,polyurea coating,su yalıtım,sprey polyurea,polyurea kaplama">
@endsection
