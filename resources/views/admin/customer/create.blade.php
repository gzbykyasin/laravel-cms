@extends('admin.layouts.master')
@section('content')

    <form method="post" action="{{url('admin/musteri')}}" enctype="multipart/form-data">
    {!! csrf_field().method_field('post') !!}
    <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Müşteri Ekle</h3>
                    <p class="text-muted m-b-30 font-13"> Müşterileri buradan oluşturabilirsiniz </p>


                    <div class="form-group row">
                        <label  class="col-2 col-form-label">İsim Soyisim</label>
                        <div class="col-10">
                            <input class="form-control" type="text" placeholder="İsim Soyisim" id="example-text-input" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Telefon</label>
                        <div class="col-10">
                            <input class="form-control"  type="tel" name="phone" placeholder="Telefon" id="example-tel-input" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input class="form-control" type="email"  name="email" id="example-email-input"  placeholder="Email" required>
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
