@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Blog</h1>
            <span>ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin col_last clearfix">

                    <!-- Posts
                    ============================================= -->
                    <div id="posts">
                        @foreach($yazilar as $yazi)
                        <div class="entry clearfix">
                            <div class="entry-image">
                                <a href="/uploads/blog/{{$yazi->predefined}}" data-lightbox="{{$yazi->title}}"><img class="image_fade" src="/uploads/blog/{{$yazi->predefined}}" alt="{{$yazi->title}}"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="{{route('blog_detail',$yazi->slug)}}">{{$yazi->title}}</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> {{ strftime('%d %B %Y',strtotime($yazi->created_at)) }}</li>
                                <li><a href="#"><i class="icon-user"></i> {{ $yazi->author }}</a></li>
                                <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                {!! $yazi->data  !!}
                                <a href="{{route('blog_detail',$yazi->slug)}}"class="more-link">Devamı</a>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- #posts end -->

                </div><!-- .postcontent end -->

                <!-- Sidebar
                ============================================= -->
                <div class="sidebar nobottommargin clearfix">
                    <div class="sidebar-widgets-wrap">

                        <div class="widget clearfix">

                            <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                                <ul class="tab-nav clearfix">
                                    <li><a href="#tabs-1">Popüler</a></li>
                                   {{-- <li><a href="#tabs-2">Son Yazılar</a></li>--}}
                                </ul>

                                <div class="tab-container">

                                    <div class="tab-content clearfix" id="tabs-1">
                                        <div id="popular-post-list-sidebar">
                                            @foreach($yazilar as $yazi)
                                            <div class="spost clearfix">
                                                <div class="entry-image">
                                                    <a href="{{route('blog_detail',$yazi->slug)}}" class="nobg"><img class="rounded-circle" src="/uploads/blog/{{$yazi->predefined}}" alt="{{$yazi->title}}"></a>
                                                </div>
                                                <div class="entry-c">
                                                    <div class="entry-title">
                                                        <h4><a href="#">{{$yazi->title}}</a></h4>
                                                    </div>
                                                    <p>{{$yazi->description}}</p>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                 {{--   <div class="tab-content clearfix" id="tabs-2">
                                        <div id="recent-post-list-sidebar">

                                            <div class="spost clearfix">
                                                <div class="entry-image">
                                                    <a href="#" class="nobg"><img class="rounded-circle" src="/assets/web/images/magazine/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="entry-c">
                                                    <div class="entry-title">
                                                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                    </div>
                                                    <ul class="entry-meta">
                                                        <li>10th July 2014</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="spost clearfix">
                                                <div class="entry-image">
                                                    <a href="#" class="nobg"><img class="rounded-circle" src="/assets/web/images/magazine/small/2.jpg" alt=""></a>
                                                </div>
                                                <div class="entry-c">
                                                    <div class="entry-title">
                                                        <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                                    </div>
                                                    <ul class="entry-meta">
                                                        <li>10th July 2014</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="spost clearfix">
                                                <div class="entry-image">
                                                    <a href="#" class="nobg"><img class="rounded-circle" src="/assets/web/images/magazine/small/3.jpg" alt=""></a>
                                                </div>
                                                <div class="entry-c">
                                                    <div class="entry-title">
                                                        <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                                    </div>
                                                    <ul class="entry-meta">
                                                        <li>10th July 2014</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>--}}

                                </div>

                            </div>

                        </div>


                        <!--
                                                    <div class="widget clearfix">

                                                        <h4>Tag Cloud</h4>
                                                        <div class="tagcloud">
                                                            <a href="#">general</a>
                                                            <a href="#">videos</a>
                                                            <a href="#">music</a>
                                                            <a href="#">media</a>
                                                            <a href="#">photography</a>
                                                            <a href="#">parallax</a>
                                                            <a href="#">ecommerce</a>
                                                            <a href="#">terms</a>
                                                            <a href="#">coupons</a>
                                                            <a href="#">modern</a>
                                                        </div>

                                                    </div> -->

                    </div>

                </div><!-- .sidebar end -->

            </div>

        </div>

    </section><!-- #content end -->

@endsection

@section('js')

@endsection
@section('css')
    <title>By Poly Sprey İzolasyon Sistemleri | Blog</title>
    <meta name="description" content="ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz">
    <meta name="keywords" content="Sprey polyurea teras kaplama,polyurea Nedir,polyurea,polyurea coating,su yalıtım,sprey polyurea,polyurea kaplama">
@endsection
