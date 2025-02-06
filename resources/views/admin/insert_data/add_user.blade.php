@extends('admin.layouts.master')

@section('title', 'Add User - SportsClub')

@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->full_name }}!</h2>
            <p class="section-lead">Add a new user to the system.</p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Add User</h4>
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
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Full Name</label>
                                        <input class="form-control" name="full_name" placeholder="Enter full name" value="{{ old('full_name') }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Age</label>
                                        <input type="number" class="form-control" name="age" placeholder="Enter age" value="{{ old('age') }}" required min="1">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>User Role</label>
                                        <select name="role_id" id="role" class="form-control" required>
                                            <option value="">Select Role</option>
                                            @foreach($roles as $id => $role)
                                                <option value="{{ $id }}">{{ ucfirst($role) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>User Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            @foreach($statuses as $status)
                                                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 d-none" id="team_select">
                                        <label>Select Team (For Players Only)</label>
                                        <select name="team_id" id="team_id" class="form-control">
                                            <option value="">Select Team</option>
                                            @if(!empty($availableTeams))
                                            @foreach($availableTeams as $team)
                                                    <option
                                                        value="{{ $team['id'] }}"
                                                        data-sport-id="{{ $team['sport_type']['id'] ?? '' }}">
                                                        {{ $team['name'] }}
                                                        (Available Slots: {{ $team['available_slots'] ?? 'N/A' }})
                                                    </option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>

                                    <div id="player_properties"></div>

                                    <div class="form-group col-12">
                                        <label>Profile Image</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script id="sportProperties" type="application/json">@json($sportProperties)</script>
    <script id="playerRoleId" type="application/json">@json($playerRoleId)</script>
    {{--<script>
        let sportProperties = @json($sportProperties);
        let playerRoleId = @json($playerRoleId); // Get Player Role ID from Laravel

        document.getElementById("role").addEventListener("change", function () {
            console.log("Selected Role ID:", this.value);
            console.log("Player Role ID:", playerRoleId);

            // Show team selection only if Player role is selected
            document.getElementById("team_select").classList.toggle("d-none", this.value != playerRoleId);

            // Reset dynamic player properties
            document.getElementById("player_properties").innerHTML = "";
        });

        document.getElementById("team_id").addEventListener("change", function () {
            let teamId = this.value;
            let sportId = this.options[this.selectedIndex]?.dataset.sportId;
            let propertiesContainer = document.getElementById("player_properties");

            if (!teamId) {
                propertiesContainer.innerHTML = "";
                return;
            }

            propertiesContainer.innerHTML = ""; // Reset previous fields

            if (sportProperties[sportId]) {
                sportProperties[sportId].forEach(property => {
                    let inputField = '';

                    switch (property.input_type) {
                        case 'text':
                            inputField = `<input type="text" class="form-control property-input" data-input-type="text" name="player_properties[${property.id}]" placeholder="Enter ${property.name}">`;
                            break;
                        case 'number':
                            inputField = `<input type="number" class="form-control" name="player_properties[${property.id}]" placeholder="Enter ${property.name}" min="0">`;
                            break;
                        case 'date':
                            inputField = `<input type="date" class="form-control" name="player_properties[${property.id}]">`;
                            break;
                        case 'boolean':
                            inputField = `
                    <select class="form-control" name="player_properties[${property.id}]">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>`;
                            break;
                        case 'dropdown':
                            let options = property.options ? property.options.split(',').map(option => `<option value="${option.trim()}">${option.trim()}</option>`).join('') : '';
                            inputField = `
                    <select class="form-control" name="player_properties[${property.id}]">
                        ${options}
                    </select>`;
                            break;
                        default:
                            inputField = `<input type="text" class="form-control" name="player_properties[${property.id}]" placeholder="Enter ${property.name}">`;
                            break;
                    }

                    let field = `
            <div class="form-group col-md-6">
                <label>${property.name}</label>
                ${inputField}
            </div>`;

                    propertiesContainer.innerHTML += field;
                });

                // Attach event listener to prevent numbers in text fields
                document.querySelectorAll('.property-input').forEach(input => {
                    input.addEventListener('input', function (event) {
                        if (this.dataset.inputType === "text") {
                            this.value = this.value.replace(/\d/g, ""); // Remove numbers from text input
                        }
                    });
                });
            }
        });

    </script>--}}


@endsection
