@include('hods.layouts.includes.header')

@include('hods.layouts.includes.navbar')

<div id="wrapper">

    <!-- Sidebar -->
    @include('hods.layouts.includes.sidebar')

    <div id="content-wrapper">

        <div class="container-fluid">

            @yield('content')
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
@include('hods.layouts.includes.footer')
