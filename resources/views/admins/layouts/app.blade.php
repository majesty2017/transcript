@include('admins.layouts.includes.header')

@include('admins.layouts.includes.navbar')

<div id="wrapper">

    <!-- Sidebar -->
    @include('admins.layouts.includes.sidebar')

    <div id="content-wrapper">

        <div class="container-fluid">

            @include('templates.alerts.alert')
            @yield('content')
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
@include('admins.layouts.includes.footer')
