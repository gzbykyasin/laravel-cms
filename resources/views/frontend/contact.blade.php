@extends('frontend.layouts.master')
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>İletişim</h1>
            <span>ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/iletisim.html')}}">İletişim</a></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Google Map
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12031.160123964091!2d29.0828783!3d41.0735821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2acefc49dc6db0f6!2sBy+Poly+Isolation+Systems+-+%C4%B0stanbul+Sprey+Polyurea+Su+Yal%C4%B1t%C4%B1m+Hizmeti!5e0!3m2!1sen!2str!4v1546967190725" width="1200" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Postcontent
                ============================================= -->
                <div class="postcontent nobottommargin">

                    <h3>Bize Ulaşın</h3>

                    <div class="contact-widget">


                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{route('sendForm')}}">
                            @csrf
                            <div class="col_one_third">
                                <label for="template-contactform-name">İsim Soyisim <small>*</small></label>
                                <input type="text"  name="name" class="sm-form-control required" />
                            </div>

                            <div class="col_one_third">
                                <label for="template-contactform-email">Email <small>*</small></label>
                                <input type="email"  name="email" class="required email sm-form-control" />
                            </div>

                            <div class="col_one_third col_last">
                                <label for="template-contactform-phone">Telefon*</label>
                                <input type="tel"  name="phone" class="sm-form-control required" />
                            </div>

                            <div class="clear"></div>

                            <div class="col_two_third">
                                <label for="template-contactform-subject">Mesaj Başlığı <small>*</small></label>
                                <input type="text"  name="title" class="required sm-form-control " />
                            </div>

                            <div class="col_one_third col_last">
                                <label for="template-contactform-service">Hizmetler</label>
                                <select class="form-control" name="service" >
                                    @foreach($menuhizmetler as $key=>$menhiz)

                                        <option value="{{ $menhiz->id }}" >{{$menhiz->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-message">Mesaj İçeriği <small>*</small></label>
                                <textarea class="required sm-form-control"  name="data" rows="3" cols="30"></textarea>
                            </div>

                            <div class="col_full">
                                <button class="button button-3d nomargin" type="submit" >Gönder</button>
                            </div>

                        </form>
                    </div>

                </div><!-- .postcontent end -->

                <!-- Sidebar
                ============================================= -->
                <div class="sidebar col_last nobottommargin">

                    <address>
                        <strong>Adres:</strong><br>
                        {{ $ayarlar->address ?? ''}}
                    </address>
                    <abbr title="Telefon Numarası"><strong>Telefon:</strong></abbr> {{ $ayarlar->phone_fixed ?? '' }}<br>
                    <abbr title="Mobil Telefon Numarası"><strong>Telefon (Mobil):</strong></abbr> {{ $ayarlar->phone_mobile ?? '' }}<br>
                    <abbr title="Email Adresi"><strong>Email:</strong></abbr> {{ $ayarlar->email ?? '' }}


                    <div class="widget noborder notoppadding">

                        <a href="https://facebook.com/{{ $ayarlar->facebook ?? '' }}" class="social-icon si-small si-dark si-facebook" target="_blank">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="https://instagram.com/{{ $ayarlar->instagram ?? '' }}" class="social-icon si-small si-dark si-instagram" target="_blank">
                            <i class="icon-instagram"></i>
                            <i class="icon-instagram"></i>
                        </a>

                        <a href="https://youtube.com/{{ $ayarlar->youtube ?? '' }}" class="social-icon si-small si-dark si-youtube" target="_blank">
                            <i class="icon-youtube"></i>
                            <i class="icon-youtube"></i>
                        </a>


                    </div>

                </div><!-- .sidebar end -->

            </div>

        </div>

    </section><!-- #content end -->
@endsection

@section('css')
    <title>By Poly Sprey İzolasyon Sistemleri | İletişim</title>
    <meta name="description" content="ByPoly olarak yeni teknolojileri takip ederek müşteri memnuniyeti ve çözüm odaklı çalışmalarımızı sürdürüyoruz">
    <meta name="keywords" content="Sprey polyurea teras kaplama,polyurea Nedir,polyurea,polyurea coating,su yalıtım,sprey polyurea,polyurea kaplama">

@endsection
@section('js')

    @include('sweet::alert')

@endsection
