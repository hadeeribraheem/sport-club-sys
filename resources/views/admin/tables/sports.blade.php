@extends('admin.layouts.master')

@section('title', 'Sports - SportsClub')

@section('content')
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        {{-- Sports Table --}}
        <div class="datatable-container">
            <table id="Sports_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Sport Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sports as $sport)
                    <tr>
                        <td>{{ $sport['id'] }}</td>
                        <td>{{ $sport['name'] }}</td>
                        <td>{{ $sport['created_at'] }}</td> <!-- Displays in "X days ago" format -->

                        <td>
                            <a href="{{ route('sports.edit', $sport['id']) }}" class="btn btn-sm btn-primary rounded-circle m-1">
                                <i class="bi bi-pen-fill text-white"></i>
                            </a>
                            <a href="javascript:void(0);"
                               class="btn btn-sm btn-danger rounded-circle m-1 delete-button"
                               data-url="/delete-item?model_name=SportType&id={{ $sport['id'] }}">
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

