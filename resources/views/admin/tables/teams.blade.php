@extends('admin.layouts.master')

@section('title', 'Teams - SportsClub')

@section('content')
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        {{-- Filter Form --}}
        <form action="{{ route('teams.index') }}" method="GET" class="mb-sm-4">
            <div class="row">
                <!-- Sport Type Filter -->
                <div class="col-md-4">
                    <label for="sport_type_id">Filter by Sport</label>
                    <select name="sport_type_id" id="sport_type_id" class="form-control">
                        <option value="">All Sports</option>
                        @foreach($sports as $sport)
                            <option value="{{ $sport['id'] }}" {{ request('sport_type_id') == $sport['id'] ? 'selected' : '' }}>
                                {{ $sport['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Filter -->
                <div class="col-md-4">
                    <label for="status">Filter by Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">All Statuses</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                {{-- Filter Button --}}
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary ms-auto w-75">Apply Filter</button>
                </div>
            </div>
        </form>

        {{-- Teams Table --}}
        <div class="datatable-container">
            <table id="Teams_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Team Name</th>
                    <th>Sport Type</th>
                    <th>Status</th>
                    <th>Players Limit</th>
                    <th>Current Players</th>
                    <th>Coach</th>
                    <th>Captain</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{ $team['id'] }}</td>
                        <td>{{ $team['name'] }}</td>
                        <td>{{ $team['sport_type']['name']}}</td>

                        <td>
                            <span class="badge bg-{{ $team['status'] == 'active' ? 'success' : 'danger' }}">
                                {{ ucfirst($team['status']) }}
                            </span>
                        </td>
                        <td>{{ $team['players_limit'] }}</td>
                        <td>{{ $team['players_count'] }}</td>
                        <td class="{{ isset($team['coach_name']) ? '' : 'text-danger fw-bold' }}">
                            {{ $team['coach_name'] ?? 'N/A' }}
                        </td>

                        <td class="{{ isset($team['captain_name']) ? '' : 'text-danger fw-bold' }}">
                            {{ $team['captain_name'] ?? 'N/A' }}
                        </td>
                        <td>
                            <a href="{{ route('teams.edit', $team['id']) }}" class="btn btn-sm btn-primary rounded-circle m-1">
                                <i class="bi bi-pen-fill text-white"></i>
                            </a>
                            <a href="javascript:void(0);"
                               class="btn btn-sm btn-danger rounded-circle m-1 delete-button"
                               data-url="/delete-item?model_name=Team&id={{ $team['id'] }}">
                                <i class="bi bi-trash3-fill text-white"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
