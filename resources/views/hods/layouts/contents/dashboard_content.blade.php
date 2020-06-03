@include('modals.hods.addResultModal')
@include('modals.hods.editResultModal')
@include('modals.hods.deleteResultModal')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('hod.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
</ol>

<!-- Icon Cards-->
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">{{ $total. ' Students!' }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">{{ $totalHod . ' HODs' }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">{{ $totalLecturer . ' Lecturers' }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">{{ $totalResult . ' Results' }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('hod.result') }}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>

<!-- Area Chart Example-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Area Chart</div>
    <div class="card-body">
        <canvas id="myAreaChart" width="100%" height="30"></canvas>
    </div>
    {{--    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
</div>

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
