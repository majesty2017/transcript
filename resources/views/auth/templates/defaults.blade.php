<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HTU | Student - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('assets/css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" id="student_id" class="form-control" name="student_id" placeholder="Student Id" autofocus="autofocus">
                        <label for="student_id">Student Id</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me">
                            Remember Password
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <div class="text-center">
                <a class="d-block small" href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>
@include('admins.auth..footer')
