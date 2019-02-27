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

                        <div class="entry clearfix">
                            <div class="entry-image">
                                <a href="/assets/web/images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="/assets/web/images/blog/standard/17.jpg" alt="Standard Post with Image"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="{{route('blog_detail','deneme')}}">This is a Standard post with a Preview Image</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 10th February 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13 Comments</a></li>
                                <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
                                <a href="{{route('blog_detail','deneme')}}"class="more-link">Devamı</a>
                            </div>
                        </div>

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
                                    <li><a href="#tabs-2">Son Yazılar</a></li>
                                </ul>

                                <div class="tab-container">

                                    <div class="tab-content clearfix" id="tabs-1">
                                        <div id="popular-post-list-sidebar">

                                            <div class="spost clearfix">
                                                <div class="entry-image">
                                                    <a href="#" class="nobg"><img class="rounded-circle" src="/assets/web/images/magazine/small/3.jpg" alt=""></a>
                                                </div>
                                                <div class="entry-c">
                                                    <div class="entry-title">
                                                        <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                                    </div>
                                                    <ul class="entry-meta">
                                                        <li><i class="icon-comments-alt"></i> 35 Comments</li>
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
                                                        <li><i class="icon-comments-alt"></i> 24 Comments</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="spost clearfix">
                                                <div class="entry-image">
                                                    <a href="#" class="nobg"><img class="rounded-circle" src="/assets/web/images/magazine/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="entry-c">
                                                    <div class="entry-title">
                                                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                    </div>
                                                    <ul class="entry-meta">
                                                        <li><i class="icon-comments-alt"></i> 19 Comments</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-content clearfix" id="tabs-2">
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
                                    </div>

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
