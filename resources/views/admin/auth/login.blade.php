@extends('admin.auth.auth_layout')
@section('title', 'Login')
@section('content')
    <div class="d-flex flex-column min-vh-100 position-relative">
        <div class="container d-flex justify-content-center align-items-center flex-grow-1">
            <div class="card admin-login-form p-4">
                <h2 class="text-center login-title mb-4 fw-bold">LOGIN</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control rounded" placeholder="Enter your email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="form-control rounded"  placeholder="Enter your password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm">LOGIN</button>
                </form>
            </div>
        </div>

        <div class="footer-image">
            <img src="{{ asset('images/sports_bg.png') }}" class="img-fluid bottom-illustration" alt="Sports Illustration">
        </div>
    </div>
@endsection
