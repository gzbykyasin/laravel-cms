@extends('admin.layouts.master')
@section('content')

<form method="post" action="{{url('admin/galeri')}}" enctype="multipart/form-data">
    {!! csrf_field().method_field('post') !!}
    <div class="row">
        <div class="col-sm-12 ol-md-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Site Galeri Ayarları</h3>
                <p class="text-muted m-b-30 font-13">Siteye galeri ekleyebilir ve bunu sayfalarda kullanabilirsiniz </p>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Galeri Başlığı Girin" id="example-text-input" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Description</label>
                    <div class="col-10">
                        <textarea class="form-control" rows="3" name="description" placeholder="Galeri Alt Açıklama Girin" required></textarea>
                    </div>
                </div>
                <label for="input-file-max-fs">Galeri Fotoğrafı Seçin ( Max 2MB )</label>
                <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M" name="photo" required/>
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

    <script src="/assets/admin/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {

            // Translated
            $('.dropify').dropify({
                messages: {
                    default: 'Bir dosyayı sürükleyip bırakın veya değiştirmek için tıklayın',
                    replace: 'Bir dosyayı sürükleyip bırakın veya değiştirmek için tıklayın',
                    remove: 'Kaldır',
                    error: 'Özür Dileriz, Bir Hata Oluştu'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>

@endsection
@section('css')
    <link rel="stylesheet" href="/assets/admin/plugins/bower_components/dropify/dist/css/dropify.min.css">
@endsection
