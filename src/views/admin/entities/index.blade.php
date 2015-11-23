@extends('admin::admin.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Пользователь</th>
                                <th>Время создания</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($entities as $entity)
                                    <tr>
                                        <td>{{ $entity->id }}</td>
                                        <td>{{ $entity->title }}</td>
                                        <td>{{ $entity->created_at }}</td>
                                        <td><a class="btn btn-primary btn-sm" href=" " title="Редактировать"><i class="fa fa-pencil"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Пользователь</th>
                                <th>Время создания</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('/packages/one-hundred-and-one-media/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/packages/one-hundred-and-one-media/admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endsection