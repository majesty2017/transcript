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
                        @error('student_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="text" id="student_id" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ old('student_id') }}" placeholder="Student Id" autofocus="autofocus">
                        <label for="student_id">Student Id</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
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

<!-- Bootstrap core JavaScript-->
<script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

</body>

</html>
