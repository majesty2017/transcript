@include('modals.addLecturerModal')
@include('modals.editLecturerModal')
@include('modals.deleteLecturerModal')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLecturerModal">
            <i class="fa fa-plus-circle"> Add Lecturer</i>
        </button>
    </li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Email</th>
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
                    <th>Email</th>
                    <th>Created date</th>
                    <th>Updated time</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($lecturers as $key => $lecturer)
                    <tr>
                        <td id="td">{{ $lecturer->id }}</td>
                        <td id="td">{{ $lecturer->name }}</td>
                        <td id="td">{{ $lecturer->email }}</td>
                        <td id="td">{{ $lecturer->created_at }}</td>
                        <td id="td">{{ $lecturer->updated_at->diffForHumans() }}</td>
                        <td>
                            <button type="button" class="btn btn-primary editLecturerModal"><i class="fa fa-pencil-alt"></i></button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger deleteLecturerModal"><i class="fa fa-minus-circle"></i></button>
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
