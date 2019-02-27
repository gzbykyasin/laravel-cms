@extends('admin.layouts.master')
@section('content')

<form method="post" action="{{url('admin/ayarlar')}}" enctype="multipart/form-data">
<!-- .row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Site Genel Ayarları</h3>
                <p class="text-muted m-b-30 font-13"> Sitenin genel ayarlarını buradan yapabilirsiniz </p>
                <div class="form-group row">
                    <label class="col-2 col-form-label">@if(is_file('uploads/'.$ayarlar->predefined))<a href="/uploads/{{$ayarlar->predefined}}" target="_blank"><i class="glyphicon glyphicon-file fileinput-exists"></i></a>@endif Ön Tanımlı Resim</label>
                    <div class="col-10">
                        <input class="form-control" type="file" name="predefined">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        {!! csrf_field().method_field('post') !!}
                        <input class="form-control" type="text" value="{{$ayarlar->name}}" id="example-text-input" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Description</label>
                    <div class="col-10">
                        <textarea class="form-control" rows="3" name="description">{{$ayarlar->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Keywords</label>
                    <div class="col-10">
                        <textarea class="form-control" rows="3" name="keywords">{{$ayarlar->keywords}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input class="form-control" type="email" value="{{$ayarlar->email}}" id="example-email-input" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">URL</label>
                    <div class="col-10">
                        <input class="form-control" type="url" value="{{$ayarlar->slug}}" id="example-url-input" name="slug">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-2 col-form-label">Telefon ( Mobil )</label>
                    <div class="col-10">
                        <input class="form-control" type="tel" value="{{$ayarlar->phone_mobile}}" id="example-tel-input" name="phone_mobile">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-2 col-form-label">Telefon ( Sabit )</label>
                    <div class="col-10">
                        <input class="form-control" type="tel" value="{{$ayarlar->phone_fixed}}" id="example-tel-input" name="phone_fixed">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Instagram</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$ayarlar->instagram}}" id="example-text-input" name="instagram">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Youtube</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$ayarlar->youtube}}" id="example-text-input" name="youtube">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Linkedin</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$ayarlar->linkedin}}" id="example-text-input" name="linkedin">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Google</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$ayarlar->google}}" id="example-text-input" name="google">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Facebook</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$ayarlar->facebook}}" id="example-text-input" name="facebook">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Adres</label>
                    <div class="col-10">
                    <textarea class="form-control" rows="5" name="address">{{$ayarlar->address}}</textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group row">
                <div class="col-4">
                    <button class=" btn btn-success" type="submit">Değişiklikleri Kaydet</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection

@section('js')

    @include('sweet::alert')

@endsection
@section('css')

@endsection
