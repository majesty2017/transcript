<div class="card card-register mx-auto mt-5">
    <div class="card-header">Register an Account</div>
    <div class="card-body">
        <form action="{{ route('admin.register.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" id="inputName" class="form-control" name="name" placeholder="Enter Full Name" value="{{ old('name') }}">
                    <label for="inputName">Full Name</label>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}">
                    <label for="inputEmail">Email address</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="form-label-group">
                            <input type="password" id="confirmPassword" class="form-control" name="password_confirmation" placeholder="Confirm password">
                            <label for="confirmPassword">Confirm password</label>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <div class="text-center">
            <a class="d-block small mt-3" href="{{ route('admin.login') }}">Login Page</a>
        </div>
    </div>
</div>
