@include('modals.addStudentModal')
@include('modals.editStudentModal')
@include('modals.deleteStudentModal')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
            <i class="fa fa-plus-circle"> Add Student</i>
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
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Programme</th>
                    <th>Email</th>
                    <th>Created date</th>
                    <th>Updated date</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>#ID</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Programme</th>
                    <th>Email</th>
                    <th>Created date</th>
                    <th>Updated date</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($students as $key => $student)
                    <tr>
                        <td id="td">{{ $student->id }}</td>
                        <td id="td">{{ $student->student_id }}</td>
                        <td id="td">{{ $student->name }}</td>
                        <td id="td">{{ $student->programme }}</td>
                        <td id="td">{{ $student->email }}</td>
                        <td id="td">{{ $student->created_at }}</td>
                        <td id="td">{{ $student->updated_at->diffForHumans() }}</td>
                        <td>
                            <button type="button" class="btn btn-primary editStudentModal"><i class="fa fa-pencil-alt"></i></button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger deleteStudentModal"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

</div>
