@extends('hods.layouts.app')

@section('title')
    Dashboard > Student
@endsection

@section('content')
    @include('messages.alerts')
    @include('hods.layouts.contents.student_content')
@stop
