@extends('admin.layouts.master')
@section('content')

<form method="post" action="{{url('admin/hizmet/'.$hizmet->id)}}" enctype="multipart/form-data">
{!! csrf_field().method_field('put') !!}
<!-- .row -->
    <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Hizmetlerimiz Düzenle</h3>
            <p class="text-muted m-b-30 font-13"> Sitenin hizmetlerimiz sayfasını buradan düzenleyebilirsiniz </p>
                <div class="form-group row">

                    <div class="col-6">
                        <label  class="col-12 col-form-label">Hizmet İsmi ( Menüde Gözükecek )</label>
                        <input class="form-control" type="text" value="{{$hizmet->name ?? ''}}" id="example-text-input" name="name" required>
                    </div>
                    <div class="col-6">
                        <div class="switchery-demo m-b-30">
                            <label  class="col-12 col-form-label">Menüde Gösterim</label>
                            <input type="checkbox" @if($hizmet->menu!=0) checked @endif class="js-switch" data-color="#99d683" name="menu"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Galeri Seçimi</label>
                    <div class="col-sm-12">
                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="gallery_id">
                            <option value="{{$hizmet->gallery_id ?? ''}}" selected>{{$hizmet->gallery->title ?? ''}}</option>
                            @foreach($galeriler as $galeri)
                                @if($galeri->id!=$hizmet->gallery_id)
                                    <option value="{{$galeri->id ?? ''}}">{{$galeri->title ?? ''}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$hizmet->title ?? ''}}" id="example-text-input" name="title" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Description</label>
                    <div class="col-10">
                        <textarea class="form-control" rows="3" name="description" required>{{$hizmet->description ?? ''}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Keywords</label>
                    <div class="col-10">
                        <textarea class="form-control" rows="3" name="keywords" required>{{$hizmet->keywords ?? ''}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Slug</label>
                    <div class="col-10">
                        <input class="form-control" name="slug" value="{{$hizmet->slug ?? ''}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">@if(is_file('uploads/hizmetler/'.$hizmet->predefined))<a href="/uploads/hizmetler/{{$hizmet->predefined}}" target="_blank"><i class="glyphicon glyphicon-file fileinput-exists"></i></a>@endif Ön Tanımlı </label>
                    <div class="col-10">
                        <input type="file" name="predefined" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Kategoriler</label>
                    <div class="col-10">
                        @if(count($hizmet->category)<=0)
                            <div class="col-md-4">
                                <label class="col-10 col-form-label alert-danger ">Kategori Girilmemiş</label>
                            </div>
                            @foreach($kategoriler as $kate)
                                <div class="col-md-2">
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="checkbox-{{$kate->id ?? ''}}" type="checkbox" name="category[]" value="{{$kate->id ?? ''}}">
                                        <label for="checkbox-{{$kate->id ?? ''}}"> {{$kate->title ?? ''}} </label>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        @foreach($hizmet->category as $kate)
                            <div class="col-md-2">
                                <div class="checkbox checkbox-success checkbox-circle">
                                    <input id="checkbox-{{$kate->id ?? ''}}" type="checkbox" checked disabled>
                                    <label for="checkbox-{{$kate->id ?? ''}}"> {{$kate->category->title ?? ''}} </label>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-2 col-form-label">İçerik</label>
                    <div class="col-10">
                        <textarea class="form-control" name="data" id="data">{{$hizmet->data ?? ''}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Extra İçerik Alanı</label>
                    <div class="col-10">
                        <textarea class="form-control" name="data_extra" id="data_extra">{{$hizmet->data_extra ?? ''}}</textarea>
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
    <script src="/assets/admin/plugins/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="/assets/admin/plugins/bower_components/tinymce/tinymce.min.js"></script>
    <script>
        $(document).ready(function() {

            if ($("#data").length > 0) {
                tinymce.init({
                    selector: "textarea#data",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }

            if ($("#data_extra").length > 0) {
                tinymce.init({
                    selector: "textarea#data_extra",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
                (this).value=1;

            });
        });
    </script>
@endsection
@section('css')
    <link href="/assets/admin/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/admin/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />
@endsection
