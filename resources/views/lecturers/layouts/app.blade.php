@include('lecturers.layouts.includes.header')

@include('lecturers.layouts.includes.navbar')

<div id="wrapper">

    <!-- Sidebar -->
    @include('lecturers.layouts.includes.sidebar')

    <div id="content-wrapper">

        <div class="container-fluid">

            @yield('content')
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
@include('lecturers.layouts.includes.footer')
