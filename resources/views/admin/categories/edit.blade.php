@extends('admin.layouts.master')
@section('content')

    <form method="post" action="{{url('admin/kategori/'.$kategori->id)}}" enctype="multipart/form-data">
    {!! csrf_field().method_field('put') !!}
    <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Site Kategori Düzenle</h3>
                    <p class="text-muted m-b-30 font-13"> Sitenin kategorilerini buradan düzenleyebilirsiniz </p>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">@if(is_file('uploads/kategori/'.$kategori->predefined))<a href="/uploads/kategori/{{$kategori->predefined}}" target="_blank"><i class="glyphicon glyphicon-file fileinput-exists"></i></a>@endif Ön Tanımlı Resim</label>
                        <div class="col-10">
                            <input class="form-control" type="file" name="predefined">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Title</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="{{$kategori->title}}" id="example-text-input" name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Description</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="3" name="description" required>{{$kategori->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Keywords</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="3" name="keywords" required>{{$kategori->keywords}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Slug</label>
                        <div class="col-10">
                            <input class="form-control" name="slug" value="{{$kategori->slug}}" >
                        </div>
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

    @include('sweet::alert')


@endsection
@section('css')

@endsection
