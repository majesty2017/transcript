
<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.student.create') }}" method="post">
                    @csrf
                    <div class="form-group @error('name') is-invalid @enderror">
                        <label for="inputName">Student Full Name</label>
                        <input type="text" class="form-control" name="name" id="inputName" placeholder="Student Full Name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('student_id') is-invalid @enderror">
                        <label for="inputStudent">Student ID</label>
                        <input type="text" class="form-control" name="student_id" id="inputStudent" placeholder="Student ID" value="{{ old('student_id') }}">
                        @error('student_id')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputProgramme">Select Programme</label>
                        <select class="form-control" name="programme" id="inputProgramme">
                            <option value="HND Computer Science">HND Computer Science</option>
                            <option value="HND ICT">HND ICT</option>
                        </select>
                    </div>

                    <div class="form-group @error('email') is-invalid @enderror">
                        <label for="inputName">Enter Student Email</label>
                        <input type="text" class="form-control" name="email" id="inputName" placeholder="Enter Student Email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('password') is-invalid @enderror">
                        <label for="inputPassword">Choose Student Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Choose Student Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputPasswordConfirmation">Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="inputPasswordConfirmation" placeholder="Re-Type Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
