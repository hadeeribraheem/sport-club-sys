@extends('admin.layouts.master')

@section('title', 'Settings')

@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Edit Settings</h2>
            <p class="section-lead">Update system-wide settings.</p>

            <div class="card">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('settings.update') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Default Sport Type</label>
                            <select name="default_sport_id" class="form-control">
                                <option value="">Select Default Sport</option>
                                @foreach($sports as $sport)
                                    <option value="{{ $sport->id }}" {{ $setting->default_sport_id == $sport->id ? 'selected' : '' }}>
                                        {{ $sport->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Max Users Per Team</label>
                            <input type="number" name="max_users_per_team" class="form-control" value="{{ $setting->max_users_per_team }}" required min="3">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
