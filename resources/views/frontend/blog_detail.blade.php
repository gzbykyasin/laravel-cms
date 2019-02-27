@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Blog Single</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog Single</li>
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
                                <h2>This is a Standard post with a Preview Image</h2>
                            </div><!-- .entry-title end -->

                            <!-- Entry Image
                            ============================================= -->
                            <div class="entry-image">
                                <a href="#"><img src="/assets/web/images/blog/full/1.jpg" alt="Blog Single"></a>

                            </div><!-- .entry-image end -->

                            <!-- Entry Content
                            ============================================= -->
                            <div class="entry-content notopmargin">

                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

                                <p>Nullam id dolor id nibh ultricies vehicula ut id elit. <a href="#">Curabitur blandit tempus porttitor</a>. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper.</p>

                                <p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.</p>

                                <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus.</p>

                                <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. <a href="#">Nullam quis risus eget urna</a> mollis ornare vel eu leo. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

                                <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper.</p>
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

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img src="/assets/web/images/magazine/small/1.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                        </div>
                                    </div>
                                </div>

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
