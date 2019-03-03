@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Blog Single</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{str_replace('|',' ',$yazi->title ?? '|')}}</li>
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

                    <div class="single-post nobottommargin">

                        <!-- Single Post
                        ============================================= -->
                        <div class="entry clearfix">

                            <!-- Entry Title
                            ============================================= -->
                            <div class="entry-title">
                                <h2>{{str_replace('|',' ',$yazi->title ?? '|')}}</h2>
                            </div><!-- .entry-title end -->

                            <!-- Entry Image
                            ============================================= -->
                            <div class="entry-image">
                                <a href="#"><img src="/uploads/blog/{{$yazi->predefined}}" alt="{{str_replace('|',' ',$yazi->title ?? '|')}}"></a>

                            </div><!-- .entry-image end -->

                            <!-- Entry Content
                            ============================================= -->
                            <div class="entry-content notopmargin">

                               {!! $yazi->data !!}
                                <!-- Post Single - Content End -->

                                <!-- Tag Cloud
                                ============================================= -->
                                <!--
                                                                    <div class="tagcloud clearfix bottommargin">
                                                                        <a href="#">general</a>
                                                                        <a href="#">information</a>
                                                                        <a href="#">media</a>
                                                                        <a href="#">press</a>
                                                                        <a href="#">gallery</a>
                                                                        <a href="#">illustration</a>
                                                                    </div>
                                                                     -->
                                <!-- .tagcloud end -->

                                <!-- <div class="clear"></div>								 -->

                            </div>
                        </div><!-- .entry end -->

                        <div class="line"></div>

                    </div>

                </div><!-- .postcontent end -->

                <!-- Sidebar
                ============================================= -->
                <div class="sidebar nobottommargin clearfix">
                    <div class="sidebar-widgets-wrap">

                        <div class="widget clearfix">

                            <h4>Hizmetlerimiz</h4>
                            <div id="post-list-footer">
                                @foreach($hizmetlerimiz as $hizmet)
                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="{{route('service_detail',$hizmet->slug)}}" class="nobg"><img src="/uploads/hizmetler/{{$hizmet->predefined}}" alt="{{str_replace('|',' ',$hizmet->title ?? '|')}}"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="{{route('service_detail',$hizmet->slug)}}">{{str_replace('|',' ',$hizmet->name ?? '|')}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div><!-- .sidebar end -->

            </div>

        </div>

    </section><!-- #content end -->
@endsection

@section('js')

@endsection
@section('css')

@endsection
