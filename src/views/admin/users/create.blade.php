@extends('admin::admin.app')

@section('htmlheader_title')
    Create User
@endsection

@section('main-content')

    @include('admin::admin.users._form')

@endsection