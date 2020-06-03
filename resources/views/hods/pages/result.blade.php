@extends('hods.layouts.app')

@section('title')
    Dashboard > Student Results
@endsection

@section('content')
    @include('messages.alerts')
    @include('hods.layouts.contents.result_content')
@stop
