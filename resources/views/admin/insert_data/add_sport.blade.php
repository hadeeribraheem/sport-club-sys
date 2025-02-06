@extends('admin.layouts.master')

@section('title', 'Add Sport')

@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Add a New Sport</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Sport Information</h4>
                </div>
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
                    <form action="{{ route('sports.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Sport Name</label>
                            <input type="text" name="sport_name" class="form-control" placeholder="Enter sport name" required>
                        </div>

                        <h5>Sport Properties</h5>
                        <div id="properties-container">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input type="text" name="properties[0][name]" class="form-control" placeholder="Property Name" value="{{ old('properties.0.name') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <select name="properties[0][type]" class="form-control">
                                        <option value="team">Team</option>
                                        <option value="individual">Individual</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="properties[0][input_type]" class="form-control">
                                        <option value="text">Text</option>
                                        <option value="number">Number</option>
                                        <option value="date">Date</option>
                                        <option value="boolean">Boolean</option>
                                        <option value="dropdown">Dropdown</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="add-property" class="btn btn-secondary btn-sm">+ Add More Properties</button>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Save Sport</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        let propertyCount = 1;

        document.getElementById('add-property').addEventListener('click', function () {
            let propertiesContainer = document.getElementById('properties-container');
            let newField = `
            <div class="form-group row">
                <div class="col-md-4">
                    <input type="text" name="properties[${propertyCount}][name]" class="form-control" placeholder="Property Name" required>
                </div>
                <div class="col-md-4">
                    <select name="properties[${propertyCount}][type]" class="form-control" required>
                        <option value="team">Team</option>
                        <option value="individual">Individual</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="properties[${propertyCount}][input_type]" class="form-control" required>
                        <option value="text">Text</option>
                        <option value="number">Number</option>
                        <option value="date">Date</option>
                        <option value="boolean">Boolean</option>
                        <option value="string">String</option>
                    </select>
                </div>
            </div>
        `;
            propertiesContainer.insertAdjacentHTML('beforeend', newField);
            propertyCount++;
        });
    </script>

@endsection
