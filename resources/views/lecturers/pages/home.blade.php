@extends('lecturers.layouts.app')

@section('title')
    Lecturer Dashboard
@endsection

@section('content')
    @include('messages.alerts')
    @include('lecturers.layouts.contents.dashboard_content')
@stop
