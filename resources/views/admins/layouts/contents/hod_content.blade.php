@include('modals.addHodModal')
@include('modals.editHodModal')
@include('modals.deleteHodModal')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHodModal">
            <i class="fa fa-plus-circle"> Add HOD</i>
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

                @foreach($hods as $key => $hod)
                    <tr>
                        <td id="td">{{ $hod->id }}</td>
                        <td id="td">{{ $hod->name }}</td>
                        <td id="td">{{ $hod->email }}</td>
                        <td id="td">{{ $hod->created_at }}</td>
                        <td id="td">{{ $hod->updated_at->diffForHumans() }}</td>
                        <td>
                            <button type="button" class="btn btn-primary editHodModal"><i class="fa fa-pencil-alt"></i></button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger deleteHodModal"><i class="fa fa-minus-circle"></i></button>
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
