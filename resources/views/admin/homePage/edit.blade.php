@extends('admin.layouts.master')
@section('content')

<form method="post" action="{{url('admin/anasayfa')}}" enctype="multipart/form-data">
{!! csrf_field().method_field('post') !!}
<!-- .row -->
    <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Anasayfa Ayarları</h3>
            <p class="text-muted m-b-30 font-13"> Sitenin anasayfa ayarlarını buradan yapabilirsiniz </p>
                <div class="form-group">
                    <label class="col-sm-12">Slider Seçimi</label>
                    <div class="col-sm-12">
                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="gallery_id">
                            <option value="{{$ayarlar->gallery_id ?? ''}}" selected>{{$ayarlar->gallery->title ?? ''}}</option>
                            @foreach($galeriler as $galeri)
                                @if($galeri->id!=$ayarlar->gallery_id)
                                    <option value="{{$galeri->id ?? ''}}" selected>{{$galeri->title ?? ''}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$ayarlar->title ?? ''}}" id="example-text-input" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Description</label>
                    <div class="col-10">
                        <textarea class="form-control" rows="3" name="description">{{$ayarlar->description ?? ''}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Keywords</label>
                    <div class="col-10">
                        <textarea class="form-control" rows="3" name="keywords">{{$ayarlar->keywords ?? ''}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">İçerik Başlığı</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$ayarlar->icerik_title ?? ''}}" id="example-email-input" name="icerik_title">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">İçerik Açıklama</label>
                    <div class="col-10">
                        <textarea class="form-control" name="icerik_description" id="icerik">{{$ayarlar->icerik_description ?? ''}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Video URL</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$ayarlar->youtube ?? ''}}" id="example-text-input" name="youtube">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Video Başlık</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$ayarlar->youtube_title ?? ''}}"  name="youtube_title">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Video Açıklama</label>
                    <div class="col-10">
                        <textarea class="form-control" name="youtube_description" id="video">{{$ayarlar->youtube_description ?? ''}}</textarea>
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

    <script src="/assets/admin/plugins/bower_components/tinymce/tinymce.min.js"></script>
    <script>
        $(document).ready(function() {

            if ($("#icerik").length > 0) {
                tinymce.init({
                    selector: "textarea#icerik",
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

            if ($("#video").length > 0) {
                tinymce.init({
                    selector: "textarea#video",
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

@endsection
@section('css')
    <link rel="stylesheet" href="/assets/admin/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />
@endsection
