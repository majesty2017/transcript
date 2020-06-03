
<!-- Add Student Modal -->
<div class="modal fade" id="editResultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lecturer.results.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="result_id" id="result_id">

                    <div class="form-group @error('course_title') is-invalid @enderror">
                        <label for="courseTitle">Course Title</label>
                        <input type="text" class="form-control" name="course_title" id="courseTitle" value="{{ old('course_title') }}">
                        @error('course_title')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('course_code') is-invalid @enderror">
                        <label for="courseCode">Course Code</label>
                        <input type="text" class="form-control" name="course_code" id="courseCode" value="{{ old('course_code') }}">
                        @error('course_code')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('grade') is-invalid @enderror">
                        <label for="grade">Grade</label>
                        <input type="text" class="form-control" name="grade" id="grade" value="{{ old('grade') }}">
                        @error('course_code')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('credit_hours') is-invalid @enderror">
                        <label for="credit_hours">Credit Hours</label>
                        <input type="text" class="form-control" name="credit_hours" id="credit_hours" value="{{ old('credit_hours') }}">
                        @error('credit_hours')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('year') is-invalid @enderror">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" name="year" id="year" value="{{ old('year') }}">
                        @error('year')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>

                    <div class="form-group @error('year') is-invalid @enderror">
                        <label for="semester">Semester</label>
                        <input type="text" class="form-control" name="semester" id="semester" value="{{ old('semester') }}">
                        @error('semester')
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
