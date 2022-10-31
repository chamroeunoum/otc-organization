<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="/dashboard">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/cdfbr') }}">
                    <i class="nav-icon icon-grid"></i> CD, FBR
                </a>
            </li>
            <li class="nav-title">Settings</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profile') }}">
                    <i class="nav-icon icon-user"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/password') }}">
                    <i class="nav-icon icon-lock"></i> Roles
                </a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>