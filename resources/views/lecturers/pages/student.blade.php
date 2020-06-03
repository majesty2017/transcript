@extends('lecturers.layouts.app')

@section('title')
    Dashboard > Student
@endsection

@section('content')
    @include('messages.alerts')
    @include('lecturers.layouts.contents.student_content')
@stop
