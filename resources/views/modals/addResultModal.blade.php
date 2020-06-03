
<!-- Add Student Modal -->
<div class="modal fade" id="addResultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.results.post') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Student</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="student_id">
                            @foreach($students as $key => $student)
                                <option value="{{ $student->id }}">{{ $student->student_id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group @error('course_title') is-invalid @enderror">
                        <label for="inputCourserTitle">Course Title</label>
                        <input type="text" class="form-control" name="course_title" id="inputCourserTitle" placeholder="Course Title" value="{{ old('course_title') }}">
                        @error('course_title')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('course_code') is-invalid @enderror">
                        <label for="inputCourserTitle">Course Code</label>
                        <input type="text" class="form-control" name="course_code" id="inputCourserTitle" placeholder="Course Code" value="{{ old('course_code') }}">
                        @error('course_code')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputGrade">Select Grade</label>
                        <select class="form-control" name="grade" id="inputGrade">
                            <option value="A+">A+</option>
                            <option value="A">A</option>
                            <option value="B+">B+</option>
                            <option value="B">B</option>
                            <option value="C+">C+</option>
                            <option value="C">C</option>
                            <option value="D+">D+</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputCreditHours">Select Credit Hours</label>
                        <select class="form-control" name="credit_hours" id="inputCreditHours">
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputYear">Select Year</label>
                        <select class="form-control" name="year" id="inputYear">
                            <option value="100">One</option>
                            <option value="200">Two</option>
                            <option value="200">Three</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputSemester">Select Semester</label>
                        <select class="form-control" name="semester" id="inputSemester">
                            <option value="One">One</option>
                            <option value="Two">Two</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
