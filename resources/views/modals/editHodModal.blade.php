<!-- Add Student Modal -->
<div class="modal fade" id="editHodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update HOD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.hod.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="hod_id" id="hod_id">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="hodName" class="form-control" name="name" value="{{ old('name') }}">
                            <label for="hodName">Full Name</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="hodEmail" class="form-control" name="email" value="{{ old('email') }}">
                            <label for="hodEmail">Email address</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
