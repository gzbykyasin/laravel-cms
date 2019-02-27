@extends('admin.layouts.master')
@section('content')
    <form method="post" action="{{url('admin/pdf/'.$pdf->id)}}" enctype="multipart/form-data">
    {!! csrf_field().method_field('put') !!}
    <!-- .row -->
        <div class="row">
            <div class="col-sm-6" >
                <div class="white-box" >
                    <h3 class="box-title m-b-0">Satılacak Hizmet Düzenle</h3>
                    <p class="text-muted m-b-30 font-13"> Satılacak olan hizmetin durumunu güncelleyebilirsiniz </p>
                    <div class="form-group row">
                        <label  class="col-4 col-form-label">Durumu Güncelle</label>
                        <div class="col-8">
                            <select class="form-control" name="status">
                                @if( $pdf->status=='active')
                                    <option value="{{ $pdf->status }}">Başarılı</option>
                                    <option value="pending">Bekleniyor</option>
                                    <option value="passive">Başarısız</option>
                                @elseif($pdf->status=='pending')
                                    <option value="{{ $pdf->status }}">Bekleniyor</option>
                                    <option value="passive">Başarısız</option>
                                    <option value="active">Başarılı</option>
                                @else
                                    <option value="{{ $pdf->status }}">Başarısız</option>
                                    <option value="pending">Bekleniyor</option>
                                    <option value="passive">Başarısız</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-8 col-form-label">Müşteri : <span class=" alert-danger">{{$pdf->customer->name}}</span></label>
                    </div>
                    <div class="form-group row">
                        <label  class="col-8 col-form-label">Para Birimi : <span class=" alert-danger">{{$pdf->type}} </span></label>
                    </div>
                    <div class="form-group row">
                        <label  class="col-8 col-form-label">Ödeme Tipi : <span class=" alert-danger">{{$pdf->payment_type}} </span></label>
                    </div>
                    <div class="form-group row">
                        <span  class="col-4 col-form-label " style="font-weight: bold;"> PDF Yolu</span>
                        @if(is_file(public_path().'/uploads/pdf/'.$pdf->slug.'.pdf'))
                        <a href="{{url('/uploads/pdf/'.$pdf->slug.'.pdf')}}" target="_blank">
                            <img src="{{url('/uploads/pdf.jpg')}}" class="img-responsive"  width="50"/>
                        </a>

                        @endif
                    </div>
                    <div class="form-group row">
                        <label  class="col-8 col-form-label">Tarih : <span class=" alert-danger"> {{$pdf->created_at}} </span></label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="white-box">
                    <div class="form-group row">
                        <div class="col-12">
                            <p class="alert alert-info center">Ürünler</p>
                        </div>

                    @if(count($pdf->product)>0)
                    @foreach($pdf->product as $prod)

                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Ürün Ad : <span class=" alert-danger">{{ $prod->name }}</span></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Ürün Miktar : <span class=" alert-danger">{{ $prod->counter }}</span></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Birim Fiyatı : <span class=" alert-danger">{{ $prod->price }}</span></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Tip : <span class=" alert-danger">{{ $prod->type }}</span></label>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    @endif
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
