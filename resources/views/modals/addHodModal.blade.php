<!-- Add Student Modal -->
<div class="modal fade" id="addHodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New HOD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.hod.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputName" class="form-control" name="name" placeholder="Enter Full Name" value="{{ old('name') }}">
                            <label for="inputName">Full Name</label>
                            @error('email')
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
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" class="form-control" name="username" placeholder="Enter Username" value="{{ old('email') }}">
                            <label for="inputUsername">Username</label>
                            @error('username')
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
            </div>
        </div>
    </div>
</div>
