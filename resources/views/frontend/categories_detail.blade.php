@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{$kategori->title}}</h1>
            <br>
            <span>{{$kategori->description}}</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="{{url('/kategori')}}">Kategoriler</a></li>
                <li class="breadcrumb-item active"><a href="{{route('category',$kategori->slug)}}">{{$kategori->title}}</a></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">
                @foreach($services as $key=>$serv)
                <div class="col_one">
                    <div class="feature-box media-box">
                        <div class="fbox-media">
                            <img src="{{url('/uploads/hizmetler/'.$serv->getService->predefined ?? '')}}" alt="{{$serv->getService->title ?? ''}}">
                        </div>
                        <div class="fbox-desc">

                            {!!  $serv->getService->data  !!}
                            <br>
                            <a href="/hizmetler/{{$serv->getService->slug ?? ''}}.html" class="button button-small button-circle button-border button-amber">Devamı</a>
                        </div>
                    </div>
                </div>

                <div class="clearfix" style="margin-bottom: 40px;"></div>

                @endforeach
            </div>
        </div>

    </section><!-- #content end -->

@endsection

@section('js')

@endsection
@section('css')
    <title>{{$kategori->title ?? ''}}</title>
    <meta name="description" content="{{$kategori->description ?? ''}}">
    <meta name="keywords" content="{{$kategori->keywords ?? ''}}">
    <link rel="canonical" href="/hizmetler/{{$services[0]->getService->slug ?? ''}}.html">

@endsection
