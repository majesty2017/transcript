@extends('hods.layouts.app')

@section('title')
    Hod Dashboard
@endsection

@section('content')
    @include('messages.alerts')
    @include('hods.layouts.contents.dashboard_content')
@stop
