@extends('admin::admin.app')

@section('htmlheader_title')
    Edit
@endsection

@section('main-content')

    @include('admin::admin.entities._form', ['entity' => $entity, 'model' => $model])

@endsection