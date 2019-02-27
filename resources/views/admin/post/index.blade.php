@extends('admin.layouts.master')
@section('content')
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Blog</h3>
                        <p class="text-muted m-b-30 font-13">Sitede kullanılan tüm yazıları buradan görebilirsiniz </p>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>SEO Title</th>
                                    <th>Slug</th>
                                    <th>Galeri</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($yazilar as $yazi)
                                <tr>
                                    <td>{{$yazi->title ?? ''}}</td>
                                    <td><a href="/blog/{{$yazi->slug ?? ''}}.html" target="_blank"><i class="glyphicon glyphicon-file fileinput-exists"></i></a>{{$yazi->slug ?? ''}}</td>
                                    <td><a href="/admin/galeri/{{$yazi->gallery->id ?? ''}}/edit" target="_blank"><i class="glyphicon glyphicon-file fileinput-exists"></i></a>{{$yazi->gallery->title ?? ''}}</td>

                                    <td>
                                        <a href="{{url('admin/yazi/'.$yazi->id.'/edit')}}" class="fcbtn btn btn-outline btn-info btn-1b">Düzenle</a>
                                        <form action="{{url('admin/yazi/'.$yazi->id)}}" method="post">
                                            {!! csrf_field().method_field('delete') !!}
                                            <button class="fcbtn btn btn-outline btn-danger btn-1b">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


@endsection

@section('js')
    <script src="/assets/admin/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;

                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                );

                                last = group;
                            }
                        });
                    }
                });

                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });

    </script>
    @include('sweet::alert')

@endsection
@section('css')
    <link href="/assets/admin/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
