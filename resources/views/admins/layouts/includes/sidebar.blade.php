<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.student') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Students</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.results') }}">
            <i class="fas fa-fw fa-calculator"></i>
            <span>Results</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.lecturer') }}">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Lecturers</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.hod') }}">
            <i class="fas fa-fw fa-people-carry"></i>
            <span>HODs</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link link resetPassWordModal">
            <i class="fas fa-fw fa-key"></i>
            <span>Reset Password</span></a>
    </li>
</ul>
