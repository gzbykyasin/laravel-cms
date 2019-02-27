@extends('admin.layouts.master')
@section('content')


        <div class="row">
            <div class="col-sm-12">

                <div class="white-box">
                    <h3 class="box-title m-b-0">Mesaj Bilgileri</h3>
                    <p class="text-muted m-b-30 font-13"> Sitede gönderilen form mesaj içeriklerini görebilirsiniz </p>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">İsim Soyisim</label>
                        <div class="col-10">
                            <p>{{ $form->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">İstediği Hizmet</label>
                        <div class="col-10">
                            <p>{{ $form->getService->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <p>{{ $form->email }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Telefon</label>
                        <div class="col-10">
                            <p>{{ $form->phone }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Mesaj Başlığı</label>
                        <div class="col-10">
                            <p>{{ $form->title }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Mesaj İçeriği</label>
                        <div class="col-10">
                            <p>{{ $form->data }}</p>
                        </div>
                    </div>
                </div>
                <form action="{{url('admin/formlar/'.$form->id)}}" method="post">
                    {!! csrf_field().method_field('delete') !!}
                    <button class="fcbtn btn btn-outline btn-danger btn-1b">Sil</button>
                </form>

            </div>

        </div>

@endsection

@section('js')

    @include('sweet::alert')


@endsection
@section('css')

@endsection
