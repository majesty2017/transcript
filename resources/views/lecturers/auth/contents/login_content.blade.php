<div class="card card-login mx-auto mt-5">
    <div class="card-header">Login</div>
    @include('messages.alerts')
    <div class="card-body">
        <form action="{{ route('lecturer.login.submit') }}" method="post">
            @csrf
            <div class="form-group @error('email') is-invalid @enderror">
                <div class="form-label-group">
                    <input type="text" id="inputEmail" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" autofocus="autofocus">
                    <label for="inputEmail">Email address</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                    @enderror
                </div>
            </div>
            <div class="form-group @error('password') is-invalid @enderror">
                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">
                    <label for="inputPassword">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me" name="remember">
                        Remember Me
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
