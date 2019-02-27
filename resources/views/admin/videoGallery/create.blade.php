@extends('admin.layouts.master')
@section('content')

    <form method="post" action="{{url('admin/video')}}" enctype="multipart/form-data">
    {!! csrf_field().method_field('post') !!}
    <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Video Galeri Ekle</h3>
                    <p class="text-muted m-b-30 font-13"> Sitenin videoları buradan oluşturabilirsiniz </p>


                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Title</label>
                        <div class="col-10">
                            <input class="form-control" type="text" placeholder="Video Title" id="example-text-input" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Description</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="3" name="description" placeholder="Video Description" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Video URL</label>
                        <div class="col-10">
                            <input class="form-control" type="text" placeholder="Video URL" id="example-text-input" name="video" required>
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
