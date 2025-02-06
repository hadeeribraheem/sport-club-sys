
<!--- ====== nav bar ====== --->
<header class="header d-flex align-items-center fixed-top">
    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('logo.png') }}" alt="Logo" height="40" class="rounded-circle">
            <span >Sports Control</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto pt-2">
        <ul class="d-flex align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-item nav-icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bell text-white"></i>
                    <span class="badge bg-primary badge-number">{{ auth()->user()->unreadNotifications->count() }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="dropdown-header">
                        You have <span class="badge bg-primary">{{ auth()->user()->unreadNotifications->count() }}</span> new notifications
                    </li>
                    <li><hr class="dropdown-divider"></li>

                    @forelse(auth()->user()->unreadNotifications as $notification)
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.notifications.read', $notification->id) }}">
                                <i class="bi bi-exclamation-circle text-warning me-2"></i>
                                <div>
                                    <span class="fw-bold">{{ $notification->data['title'] }}</span>
                                    <div class="small text-muted">{{ $notification->data['message'] }}</div>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    @empty
                        <li class="dropdown-item text-center text-muted">No new notifications</li>
                    @endforelse

                    <li class="text-center">
                        <a class="dropdown-item text-primary fw-bold" href="{{ route('admin.notifications') }}">View all notifications</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">
                    @if(Auth::user()->image)
                        <img src="{{ asset('images/' .Auth::user()->image->name) }}" alt="image" style="width: 40px;height: 40px; object-fit: cover;" class="rounded-circle mr-1">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" alt="image" style="width: 40px;height: 40px; object-fit: cover;" class="rounded-circle mr-1">
                    @endif

                    <div class="d-none d-lg-inline-block">
                        <span class="text-white">Hi, {{ Auth::user()->full_name }}</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</header>
<!-- End of nav bar -->
