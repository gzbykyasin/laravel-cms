@extends('admin.layouts.master')
@section('content')

    <form method="post" action="{{url('admin/hizmet')}}" enctype="multipart/form-data">
    {!! csrf_field().method_field('post') !!}
    <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Site Hizmtelerimiz Ekle</h3>
                    <p class="text-muted m-b-30 font-13"> Sitenin hizmetlerimiz sayfasını buradan oluşturabilirsiniz </p>
                    <div class="form-group row">
                        <label class="col-12 col-form-label">Hizmet İsmi ( Menüde Gözükecek )</label>
                        <div class="col-10">
                            <input class="form-control" type="text" placeholder="Hizmet İsmi Girin" id="example-text-input" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Galeri Seçimi</label>
                        <div class="col-sm-12">
                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="gallery_id">
                                @foreach($galeriler as $galeri)
                                    <option value="{{$galeri->id ?? ''}}" selected>{{$galeri->title ?? ''}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Title</label>
                        <div class="col-10">
                            <input class="form-control" type="text" placeholder="Hizmet SEO Title" id="example-text-input" name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Description</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="3" name="description" placeholder="Hizmet SEO Description" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Keywords</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="3" name="keywords" required placeholder="Hizmet SEO Keywords"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Slug</label>
                        <div class="col-10">
                            <input class="form-control" name="slug" placeholder="Bilgi Sahibi Değilseniz Boş Bırakın" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Ön Tanımlı Resim</label>
                        <div class="col-10">
                            <input type="file" name="predefined" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">İçerik</label>
                        <div class="col-10">
                            <textarea class="form-control" name="data" id="data" placeholder="İçerik Alanı"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Extra İçerik Alanı</label>
                        <div class="col-10">
                            <textarea class="form-control" name="data_extra" id="data_extra" placeholder="Extra İçerik Alanı"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-2 col-form-label">Kategoriler</span>
                        <div class="col-10">
                            @foreach($kategoriler as $kategori)
                                <div class="col-md-2">
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="checkbox-{{$kategori->id ?? ''}}" type="checkbox" name="category[]" value="{{$kategori->id}}" checked>
                                        <label for="checkbox-{{$kategori->id ?? ''}}"> {{$kategori->title ?? ''}} </label>
                                    </div>
                                </div>
                            @endforeach
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
{{--
    <script src="/assets/admin/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
--}}
    <script type="text/javascript" src="/assets/admin/plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
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

@endsection
@section('css')
{{--
    <link href="/assets/admin/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
--}}
    <link href="/assets/admin/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/admin/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />
@endsection
