<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <img src="{{ URL::to('assets/img/logo.jpg') }}" width="50px" alt="logo">
{{--            <i class="fas fa-fw fa-tachometer-alt"></i>--}}
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('how-to-uses') }}">
            <i class="fa fa-hands-helping"></i>
            <span>How To Use</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('transcript') }}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Apply For Transcript</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link link">
            <i class="fas fa-fw fa-key"></i>
            <span>Reset Password</span></a>
    </li>
</ul>
