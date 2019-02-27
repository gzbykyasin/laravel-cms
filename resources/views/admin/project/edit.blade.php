@extends('admin.layouts.master')
@section('content')

<form method="post" action="{{url('admin/proje/'.$proje->id)}}" enctype="multipart/form-data">
{!! csrf_field().method_field('put') !!}
<!-- .row -->
    <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Proje Düzenle</h3>
            <p class="text-muted m-b-30 font-13"> Sitenin projelerini buradan düzenleyebilirsiniz </p>
                <div class="form-group">
                    <label class="col-sm-12">Galeri Seçimi</label>
                    <div class="col-sm-12">
                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="gallery_id">
                            <option value="{{$proje->service ?? ''}}" selected>{{$proje->service ?? ''}}</option>
                            @foreach($hizmetler as $hizmet)
                                @if($hizmet->name!=$proje->service)
                                    <option value="{{$hizmet->name ?? ''}}" selected>{{$hizmet->name ?? ''}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$proje->name ?? ''}}" id="example-text-input" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Description</label>
                    <div class="col-10">
                        <textarea class="form-control" rows="3" name="description" required>{{$proje->description ?? ''}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">@if(is_file('uploads/proje/'.$proje->predefined))<a href="/uploads/blog/{{$proje->predefined}}" target="_blank"><i class="glyphicon glyphicon-file fileinput-exists"></i></a>@endif Ön Tanımlı </label>
                    <div class="col-10">
                        <input type="file" name="predefined" class="form-control">
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
