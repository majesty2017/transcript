<!-- Add Student Modal -->
<div class="modal fade" id="editLecturerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Lecturer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.lecturer.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="lecture_id" id="lecture_id">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="lecName" class="form-control" name="name" value="{{ old('name') }}">
                            <label for="lecName">Full Name</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="lecEmail" class="form-control" name="email" value="{{ old('email') }}">
                            <label for="lecEmail">Email address</label>
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
