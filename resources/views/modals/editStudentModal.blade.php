<!-- Edit Student Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.student.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="index_number" id="index_number">

                    <div class="form-group @error('name') is-invalid @enderror">
                        <label for="name">Student Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('programme') is-invalid @enderror">
                        <label for="programme">Select Programme</label>
                        <input type="text" class="form-control" name="programme" id="programme" value="{{ old('programme') }}">
                        @error('programme')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('student_id') is-invalid @enderror">
                        <label for="student">Student ID</label>
                        <input type="text" class="form-control" name="student_id" id="student" value="{{ old('student_id') }}">
                        @error('student_id')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('email') is-invalid @enderror">
                        <label for="email">Enter Student Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
