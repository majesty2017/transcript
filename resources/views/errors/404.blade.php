@extends('templates.default')

@section('title')
    404 - Error
@endsection

@section('content')
    <h1>Oops, that page could not be found.</h1>
    <a href="{{ route('home') }}">Go back home</a>
@endsection
