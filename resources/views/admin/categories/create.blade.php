@extends('admin.layouts.master')
@section('content')

    <form method="post" action="{{url('admin/kategori')}}" enctype="multipart/form-data">
    {!! csrf_field().method_field('post') !!}
    <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Kategori Ekle</h3>
                    <p class="text-muted m-b-30 font-13"> Sitenin kategorilerini buradan oluşturabilirsiniz </p>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Ön Tanımlı Resim</label>
                        <div class="col-10">
                            <input class="form-control" type="file" name="predefined">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Title</label>
                        <div class="col-10">
                            <input class="form-control" type="text" placeholder="Kategori SEO Title" id="example-text-input" name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Description</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="3" name="description" placeholder="Kategori SEO Description" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Keywords</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="3" name="keywords" required placeholder="Kategori SEO Keywords"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Slug</label>
                        <div class="col-10">
                            <input class="form-control" name="slug" placeholder="Bilgi Sahibi Değilseniz Boş Bırakın" >
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
