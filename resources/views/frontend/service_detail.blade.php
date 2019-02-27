@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{$hizmet->name}}</h1>
            <div id="portfolio-navigation">

                <a href="{{url('/hizmetler/'.$hizmetler[0]->slug.'.html' ?? '')}}"><i class="icon-angle-left"></i></a>
                <a href="{{url('/hizmetler/'.$hizmet->slug.'.html' ?? '') }}"><i class="icon-line-grid"></i></a>
                <a href="{{url('/hizmetler/'.$hizmetler[1]->slug.'.html' ?? '')}}"><i class="icon-angle-right"></i></a>

            </div>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="postcontent col_last nobottommargin">
                    <div class="fancy-title title-dotted-border">
                        <h1>{{$hizmet->name}}</h1><br>
                        {!! $hizmet->description !!}
                    </div>

                    <!-- Portfolio Single Gallery
                    ============================================= -->
                    <div class="col_full portfolio-single-image">
                        <div class="fslider" data-arrows="true" data-animation="slide">
                            <div class="flexslider">
                                <div class="slider-wrap">
                                    @foreach($resimler as $resim)
                                    <div class="slide"><a href="{{url('/uploads/galeri/'.$resim->photo ?? '')}}"><img src="{{url('/uploads/galeri/'.$resim->photo ?? '')}}" alt="{{$resim->photo_alt ?? ''}}"></a></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- .portfolio-single-image end -->

                    <!-- Portfolio Single Content
                    ============================================= -->
                    <div class="col_full portfolio-single-content nobottommargin">

                        <!-- Portfolio Single - Description
                        ============================================= -->

                        {!! $hizmet->data !!}

                        {!! $hizmet->data_extra !!}

                    </div><!-- .portfolio-single-content end -->


                    <div class="clear"></div>

                    <div class="divider divider-center"><i class="icon-circle"></i></div>

                    <!-- Related Portfolio Items
                    ============================================= -->
                    <h4>Son Projelerimiz:</h4>

                    <div id="related-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="20" data-nav="false" data-autoplay="5000" data-items-xs="1" data-items-sm="2" data-items-xl="3">
                        @foreach($projeler as $proje)
                        <div class="oc-item">
                            <div class="iportfolio">
                                <div class="portfolio-image">
                                    <a href="{{url('/uploads/proje/'.$proje->predefined)}}">
                                        <img src="{{url('/uploads/proje/'.$proje->predefined)}}" alt="{{$proje->description}}">
                                    </a>
                                    <div class="portfolio-overlay">
                                        <a href="{{url('/uploads/proje/'.$proje->predefined)}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                        <a href="{{url('/uploads/proje/'.$proje->predefined)}}" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="portfolio-single.html">{{$proje->title}}</a></h3>
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div><!-- .portfolio-carousel end -->

                </div>

                <div class="sidebar nobottommargin">
                    <div class="sidebar-widgets-wrap">
                        <div class="widget clearfix">

                            <h4>Hizmetlerimiz</h4>
                            <div id="oc-portfolio-sidebar" class="owl-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000">
                                @foreach($tumhizmetler as $hiz)
                                <div class="oc-item">
                                    <div class="iportfolio">
                                        <div class="portfolio-image">
                                            <a href="#">
                                                <img src="{{url('/uploads/hizmetler/'.$hiz->predefined)}}" alt="{{$hiz->name}}">
                                            </a>
                                            <div class="portfolio-overlay">
                                                <a href="{{url('/uploads/hizmetler/'.$hiz->predefined)}}" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="portfolio-desc center nobottompadding">
                                            <h3><a href="{{url('/hizmetler/'.$hiz->slug.'.html')}}">{{$hiz->name}}</a></h3>
                                            <span>{{$hiz->title}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="widget clearfix">

                            <h4>Kategoriler</h4>

                                @foreach($kategoriler as $kategori)
                                        <div class="tagcloud">
                                            <a href="/kategori/{{$kategori->category->slug ?? ''}}.html">{{$kategori->category->title}}</a>
                                        </div>
                                @endforeach


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section><!-- #content end -->

@endsection

@section('js')

@endsection
@section('css')
    <title>{{$hizmet->title ?? ''}}</title>
    <meta name="description" content="{{$hizmet->description ?? ''}}">
    <meta name="keywords" content="{{$hizmet->keywords ?? ''}}">
@endsection
