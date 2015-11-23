@extends('admin::admin.app')

@section('htmlheader_title')
    Create
@endsection

@section('main-content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $entity->getAlias() }}</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{  route('admin.entity.store', $entity->getAlias()) }}" method="POST">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="box-body">
                @if($entity->formFields())
                    @foreach($entity->formFields() as $field)
                        @include('admin::admin.fields.'. $field['type'], $field)
                    @endforeach
                @endif
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div><!-- /.box -->

@endsection