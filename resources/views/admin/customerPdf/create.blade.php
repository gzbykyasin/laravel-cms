@extends('admin.layouts.master')
@section('content')

    <form method="post" action="{{url('admin/pdf')}}" enctype="multipart/form-data">
    {!! csrf_field().method_field('post') !!}
    <!-- .row -->
        <div class="row">
            <div class="col-sm-6" >
                <div class="white-box" >
                    <h3 class="box-title m-b-0">PDF Oluştur</h3>
                    <p class="text-muted m-b-30 font-13"> PDF  buradan oluşturabilirsiniz </p>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">Müşteri Seç</label>
                        <div class="col-8">
                            <select class="form-control" name="customer_id">
                                @foreach($musteriler as $musteri)
                                    <option value="{{$musteri->id}}">{{$musteri->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">Para Birimi</label>
                        <div class="col-8">
                            <select class="form-control" name="type">
                                <option value="€">€</option>
                                <option value="tl">TL</option>
                                <option value="$">$</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">Ödeme Tipi</label>
                        <div class="col-8">
                            <select class="form-control" name="payment_type">
                                <option value="Nakit">Nakit</option>
                                <option value="Çek">Çek</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">PDF İsmi</label>
                        <div class="col-8">
                            <input class="form-control"  type="text" name="title" placeholder="Pdf İçin İsim Giriniz" id="example-text-input" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">Tarih</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="created_at" placeholder="" data-mask="99-99-9999"  value="{{$tarih}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="white-box" style="padding-bottom: 76px;">
                    <p class="text-muted m-b-30 font-13"> </p>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">Yetkili İsmi</label>
                        <div class="col-8">
                            <input class="form-control"  type="text" name="yetkili_name" value="Barış DOĞRUER" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">Yetkili Telefon</label>
                        <div class="col-8">
                            <input class="form-control"  type="text" name="yetkili_phone" value="0533 407 94 10" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">Yetkili Email</label>
                        <div class="col-8">
                            <input class="form-control"  type="text" name="yetkili_email" value="info@bypoly.com" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">Yetkili Firma</label>
                        <div class="col-8">
                            <input class="form-control"  type="text" name="yetkili_company" value="By Poly Isolation Systems" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="form-group row">
                        <div class="col-4">
                            <a class=" btn btn-danger" id="ekle">Ürün Ekle</a>
                        </div>
                    </div>
                    <div class="form-group row" id="icerik">

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4">
                    <button class=" btn btn-success" type="submit">Değişiklikleri Kaydet</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script src="/assets/admin/js/mask.js"></script>
    @include('sweet::alert')
    <script type="text/javascript">
        $(function () {
            $("#ekle").on("click", function () {
                $("#icerik").append('<div class="col-md-6">' +
                    '<div class="form-group row">' +
                    '<div class="col-md-12">' +
                    '<label>Ürün Ad</label>' +
                    '<input class="form-control col-md-12 col-xs-12" name="urun_ad[]" placeholder="Ürün İsmini Girin">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group row">' +
                    '<div class="col-md-12">' +
                    '<label>Ürün Miktar</label>' +
                    '<input class="form-control col-md-12 col-xs-12" name="miktar[]" placeholder="Ürün Miktarını Girin">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group row">' +
                    '<div class="col-md-12">' +
                    '<label>Birim Fiyatı</label>' +
                    '<input class="form-control col-md-12 col-xs-12" name="birim_fiyat[]" placeholder="Birim Fiyatı Girin">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group row">'+
                    '<div class="col-md-12">'+
                    '<label>Tip</label>'+
                    '<select class="form-control col-md-6" name="tip[]">'+
                    '<option value="kg">kg</option>'+
                    '<option value="m2">m2</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '</div>');
            });
        });

    </script>
@endsection
@section('css')

@endsection
