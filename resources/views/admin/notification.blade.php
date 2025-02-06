@extends('admin.layouts.master')
@section('title', 'Notifications - SportsClub')

@section('content')
    <section class="notification section">
        <div class="section-body">
            <div class="row">
                @forelse($notifications as $notification)
                    <div class="col-lg-6 col-md-12">
                        <div class="card radius-10 border-start border-0 border-3 {{ $notification->read_at ? 'border-secondary' : 'border-info' }}">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">{{ $notification->data['title'] ?? 'Notification' }}</p>
                                        <h5 class="my-1 text-dark">{{ $notification->data['message'] ?? 'You have a new notification.' }}</h5>
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                        <i class="fa-solid fa-bell"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('admin.notifications.read', $notification->id) }}" class="btn btn-sm btn-primary">
                                        Mark as Read
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="card radius-10 border-start border-0 border-3 border-secondary">
                            <div class="card-body text-center">
                                <h5 class="text-muted">No Notifications Available</h5>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
