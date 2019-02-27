@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row row-in">
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="H" class="linea-icon linea-basic"></i>
                                <h5 class="text-muted vb">MÜŞTERİLER</h5> </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-danger">{{$musteri}}</h3> </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{$musteri}}" aria-valuemin="0" aria-valuemax="50" style="width: {{$musteri}}%">  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                <h5 class="text-muted vb">HİZMETLER</h5> </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-megna">{{$hizmet}}</h3> </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="{{$hizmet}}" aria-valuemin="0" aria-valuemax="50" style="width: {{$hizmet}}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="^"></i>
                                <h5 class="text-muted vb">GALERİLER</h5> </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-primary">{{$galeri}}</h3> </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{$galeri}}" aria-valuemin="0" aria-valuemax="50" style="width: {{$galeri}}%"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6  b-0">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                <h5 class="text-muted vb">BLOG YAZILARI</h5> </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-success">{{$yazi}}</h3> </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$yazi}}" aria-valuemin="0" aria-valuemax="50" style="width: {{$yazi}}%"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">VERİLEN TAKLİFLER</h3>
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Fiyat ve Durum Endeksi</h5>
                    </li>
                </ul>
                <div id="teklifler" ></div>

            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="/assets/admin/bootstrap/dist/js/tether.min.js"></script>
    <script src="/assets/admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="/assets/admin/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="/assets/admin/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="/assets/admin/plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/assets/admin/js/custom.min.js"></script>
    <script src="/assets/admin/js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="/assets/admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="/assets/admin/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="/assets/admin/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.toast({
                heading: 'ByPoly CMS Panele Hoşgeldini',
                text: 'Site içeriklerini oluşturabilir ve yönetebilirsiniz',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 3500,
                stack: 6
            })
        });

        Morris.Bar({
            element: 'teklifler',
            data: @json($data),
            xkey: ['status'],
            ykeys: ['price'],
            labels: ['Fiyat']
        }).on('click', function(i, row){
            console.log(i, row);
        });
    </script>
@endsection
@section('css')
    <link href="/assets/admin/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="/assets/admin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
@endsection
