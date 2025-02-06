@extends('admin.layouts.master')

@section('title', 'Dashboard - SportsClub')

@section('content')
    <section class="dashboard section">
        <div class="section-body">
            <h2 class="section-title">Welcome, {{ Auth::user()->name }}</h2>
            <p class="section-lead">Here's an overview of your sports club.</p>
        </div>

        <div class="section-body">
            <div class="row">
                <!-- Total Teams -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Teams</p>
                                    <h4 class="my-1 text-secondary">{{ $totalTeams }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Players -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Players</p>
                                    <h4 class="my-1 text-danger">{{ $totalPlayers }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                                    <i class="fa-solid fa-running"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Players -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Active Players</p>
                                    <h4 class="my-1 text-success">{{ $activePlayers }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                    <i class="fa-solid fa-user-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sports Types -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-start border-0 border-3 border-primary">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Sports Types</p>
                                    <h4 class="my-1 text-primary">{{ $sportsTypes }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-sport text-white ms-auto">
                                    <i class="fa-solid fa-basketball-ball"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Coaches -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-start border-0 border-3 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Coaches</p>
                                    <h4 class="my-1 text-warning">{{ $totalCoaches }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                                    <i class="fa-solid fa-chalkboard-teacher"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Captains -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-start border-0 border-3 border-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Captains</p>
                                    <h4 class="my-1 text-dark">{{ $totalCaptains }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-dark text-white ms-auto">
                                    <i class="fa-solid fa-user-shield"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Quick Actions -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Quick Actions</h5>
                            <a href="{{ route('teams.create') }}" class="btn btn-primary w-100 my-2">
                                <i class="fa-solid fa-plus"></i> Add New Team
                            </a>
                            <a href="{{ route('users.create') }}" class="btn btn-success w-100 my-2">
                                <i class="fa-solid fa-user-plus"></i> Add New User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
