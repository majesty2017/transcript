@extends('lecturers.layouts.app')

@section('title')
    Dashboard > Student Results
@endsection

@section('content')
    @include('messages.alerts')
    @include('lecturers.layouts.contents.result_content')
@stop
