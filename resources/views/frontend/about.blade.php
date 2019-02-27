@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Kurumsal</h1>
            <span>ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/kurumsal.html')}}">Kurumsal</a></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_one_third">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Neden <span>By Poly</span></h4>
                    </div>

                    <p>By Poly olarak su yalıtımında yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürmeye devam ediyoruz.</p>

                </div>

                <div class="col_one_third">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Misyonumuz <span></span></h4>
                    </div>

                    <p>Günümüzde sürekli gelişen inşaat sektöründe büyüme yaşanırken su yalıtımında büyük problemler yaşanmaktaydı. Su yalıtımında uygulanan eski sistemlerin sonuçsuz kalmasından dolayı yeni çözümler bulmak gerekti. </p>

                </div>

                <div class="col_one_third col_last">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Vizyonumuz <span></span></h4>
                    </div>

                    <p>Bu sebepten dolayı son teknoloji ve yeni sistem olan Sprey Polyurea uygulamasını By Poly olarak kullanmaya 7 yıl önce karar verdik. 7 yıldır başarıyla tamamladığımız tüm projelerde müşteri memnuniyeti önceliği ile çalıştık.</p>

                </div>

            </div>

          {{--  <div class="section nomargin">
                <div class="container clearfix">

                    <div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
                        <i class="i-plain i-xlarge divcenter icon-line2-directions"></i>
                        <div class="counter counter-lined"><span data-from="100" data-to="846" data-refresh-interval="50" data-speed="2000"></span>K+</div>
                        <h5>Lines of Codes</h5>
                    </div>

                    <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
                        <i class="i-plain i-xlarge divcenter nobottommargin icon-line2-graph"></i>
                        <div class="counter counter-lined"><span data-from="3000" data-to="15360" data-refresh-interval="100" data-speed="2500"></span>+</div>
                        <h5>KBs of HTML Files</h5>
                    </div>

                    <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
                        <i class="i-plain i-xlarge divcenter nobottommargin icon-line2-layers"></i>
                        <div class="counter counter-lined"><span data-from="10" data-to="408" data-refresh-interval="25" data-speed="3500"></span>*</div>
                        <h5>No. of Templates</h5>
                    </div>

                    <div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
                        <i class="i-plain i-xlarge divcenter nobottommargin icon-line2-clock"></i>
                        <div class="counter counter-lined"><span data-from="60" data-to="1200" data-refresh-interval="30" data-speed="2700"></span>+</div>
                        <h5>Hours of Coding</h5>
                    </div>

                </div>
            </div>--}}

        </div>

    </section><!-- #content end -->
@endsection
@section('css')
    <title>By Poly | Sprey İzolasyon Sistemleri | Hakkımızda</title>
    <meta name="description" content="Sprey Polyurea ; dünyada en çok tercih edilen ve %100 sonuç veren yüksek performanslı su yalıtım uygulamasıdır. ">
    <meta name="keywords" content="polyurea kaplama , polyurea su izolasyonu , polyurea su yalıtımı , sprey polyurea , çatı su izolasyonu , teras su izolasyonu , polyurea havuz kaplama , otopark su izolasyonu">
@endsection
@section('js')

@endsection
