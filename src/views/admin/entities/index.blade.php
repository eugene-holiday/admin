@extends('admin::admin.app')

@section('htmlheader_title')
    {{ $entityModel->getAlias() }}
@endsection


@section('main-content')
    <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-primary" href="{{ route('admin.entity.create', $entityModel->getAlias())}}">Создать <i class="fa fa-plus"></i></a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                @foreach($entityModel->columns() as $column)
                                    <th>{{ $column['label'] }}</th>
                                @endforeach
                                <th>Дата создания</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($entities as $entity)
                                    <tr>
                                        <td>{{ $entity->id }}</td>
                                        @foreach($entity->columns() as $column)
                                            <td>{{ $column['value'] }}</td>
                                        @endforeach
                                        <td>{{ $entity->created_at }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.entity.edit', [$entity->getAlias(), $entity->id]) }}" title="Редактировать"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-sm" href="{{ route('admin.entity.destroy', [$entity->getAlias(), $entity->id]) }}" data-method="delete" data-confirm="Вы уверены?" title="Удалить"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('/packages/media101/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/packages/media101/admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endsection