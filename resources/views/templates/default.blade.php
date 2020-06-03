@include('templates.includes.header')

@include('templates.includes.navbar')

<div id="wrapper">

    <!-- Sidebar -->
@include('templates.includes.sidebar')

    <div id="content-wrapper">

        <div class="container-fluid">

            @include('templates.alerts.alert')
            @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

@include('templates.includes.footer')
