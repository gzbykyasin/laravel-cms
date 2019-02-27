@extends('admin.layouts.master')
@section('content')

    <form method="post" action="{{url('admin/musteri/'.$musteri->id)}}" enctype="multipart/form-data">
    {!! csrf_field().method_field('put') !!}
    <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Müşteri Ekle</h3>
                    <p class="text-muted m-b-30 font-13"> Müşterileri buradan oluşturabilirsiniz </p>


                    <div class="form-group row">
                        <label  class="col-2 col-form-label">İsim Soyisim</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="{{$musteri->name}}" id="example-text-input" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Telefon</label>
                        <div class="col-10">
                            <input class="form-control"  name="phone" value="{{$musteri->phone}}" id="example-tel-input" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input class="form-control" name="email" value="{{$musteri->email}}" id="example-email-input" required>
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
    @if(count($musteri->pdf)>0)
        <div class="col-sm-12">
            <div class="white-box">
                <div id="image-popups" class="row">
                    <div class="card-group">
                        @foreach($musteri->pdf as $photo)
                            <div class="card col-sm-3">
                                <a href="{{url('/uploads/pdf/'.$photo->slug.'.pdf')}}" target="_blank">
                                    <img src="{{url('/uploads/pdf.jpg')}}" class="img-responsive" />
                                </a>
                                <div class="card-footer">
                                    <label class="alert-info">{{$photo->created_at}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('js')
    @include('sweet::alert')
@endsection
@section('css')

@endsection
