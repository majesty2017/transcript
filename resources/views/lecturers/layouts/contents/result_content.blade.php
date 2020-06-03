@include('modals.lecturers.addResultModal')
@include('modals.lecturers.editResultModal')
@include('modals.lecturers.deleteResultModal')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addResultModal">
            <i class="fa fa-plus-circle"> Add Result</i>
        </button>
    </li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Programme</th>
                    <th>Course Title</th>
                    <th>Course Code</th>
                    <th>Credit Hours</th>
                    <th>Grade</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Created date</th>
                    <th>Updated time</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Programme</th>
                    <th>Course Title</th>
                    <th>Course Code</th>
                    <th>Credit Hours</th>
                    <th>Grade</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Created date</th>
                    <th>Updated time</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($results as $key => $result)
                    <tr>
                        <td id="td">{{ $result->id }}</td>
                        <td id="td">{{ $result->student->name }}</td>
                        <td id="td">{{ $result->student->student_id }}</td>
                        <td id="td">{{ $result->student->programme }}</td>
                        <td id="td">{{ $result->course_title }}</td>
                        <td id="td">{{ $result->course_code }}</td>
                        <td id="td">{{ $result->credit_hours }}</td>
                        <td id="td">{{ $result->grade }}</td>
                        <td id="td">{{ $result->year }}</td>
                        <td id="td">{{ $result->semester }}</td>
                        <td id="td">{{ $result->created_at }}</td>
                        <td id="td">{{ $result->updated_at->diffForHumans() }}</td>
                        <td>
                            <button type="button" class="btn btn-primary editResultModal"><i class="fa fa-pencil-alt"></i></button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger deleteResultModal"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{--    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
</div>

</div>
