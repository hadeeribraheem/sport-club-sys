<!--- ====== side bar ====== --->
<aside id="sideBar" class="sideBar col-md-2 col-auto min-vh-100">
    <ul class="sideBar-nav">
        <li class="nav-item ">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-header">Design Studio</li>
        <li class="nav-item">
            <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#forms-nav" aria-expanded="false">
                <i class="bi bi-journal-text"></i>
                <span>Forms</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sideBar">
                <li>
                    <a href="{{ route('users.create') }}">
                        <i class="bi bi-circle"></i><span>Add User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('teams.create') }}">
                        <i class="bi bi-circle"></i><span>Add Team</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sports.create') }}">
                        <i class="bi bi-circle"></i><span>Add Sport</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#tables-nav" aria-expanded="false">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Tables</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sideBar">
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="bi bi-circle"></i><span>Show Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('teams.index')}}">
                        <i class="bi bi-circle"></i><span>Show Teams</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sports.index') }}">
                        <i class="bi bi-circle"></i><span>Show Sports</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-heading">Pages</li>
        <li class="nav-item">
            <a href="#" class="nav-link collapsed">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link collapsed">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.notifications')}}" class="nav-link collapsed">
                <i class="fa-regular fa-bell"></i>
                <span>Notifications</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link collapsed">
                <i class="bi bi-box-arrow-left text-danger"></i>
                <span class="text-danger">Logout</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End of nav bar -->
