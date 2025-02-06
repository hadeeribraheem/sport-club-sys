@extends('admin.layouts.master')
@section('title', 'Users - Dookan')

@section('content')
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        {{-- Filter Form --}}
        <form action="{{ route('users.index') }}" method="GET" class="mb-sm-4">
            <div class="row">
                <!-- Role Filter -->
                <div class="col-md-4">
                    <label for="role_id">Filter by Role</label>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="">All Roles</option>
                        <option value="1" {{ request('role_id') == '1' ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ request('role_id') == '2' ? 'selected' : '' }}>Coach</option>
                        <option value="3" {{ request('role_id') == '3' ? 'selected' : '' }}>Captain</option>
                        <option value="4" {{ request('role_id') == '4' ? 'selected' : '' }}>Player</option>
                    </select>
                </div>

                <!-- Status Filter -->
                <div class="col-md-4">
                    <label for="status">Filter by Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">All Statuses</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="injured" {{ request('status') == 'injured' ? 'selected' : '' }}>Injured</option>
                        <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                    </select>
                </div>

                {{-- Filter Button --}}
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary ms-auto w-75">Apply Filter</button>
                </div>
            </div>
        </form>

        <div class="datatable-container">
            <table id="Data_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Profile Image</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['full_name'] }}</td>
                        <td>
                            @if(!empty($user['image']))
                                <img src="{{ asset('images/'.$user['image']['name']) }}" alt="User Image" class="img-fluid w-50">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="default.jpg" class="img-fluid rounded-circle w-50" >
                            @endif
                        </td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ ucfirst($user['role']['name']) }}</td>
                        <td>
                            <span class="badge bg-{{ $user['status'] == 'active' ? 'success' : 'danger' }}">
                                {{ ucfirst($user['status']) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-sm btn-primary rounded-circle m-1">
                                <i class="bi bi-pen-fill text-white"></i>
                            </a>
                            {{--<a href="/delete-item?model_name=User&id={{ $user['id'] }}" class="btn btn-sm btn-danger rounded-circle m-1">
                                <i class="bi bi-trash3-fill text-white"></i>
                            </a>--}}
                            <a href="javascript:void(0);"
                               class="btn btn-sm btn-danger rounded-circle m-1 delete-button"
                               data-url="/delete-item?model_name=User&id={{ $user['id'] }}">
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
