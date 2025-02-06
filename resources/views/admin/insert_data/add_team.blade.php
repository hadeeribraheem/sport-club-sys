@extends('admin.layouts.master')

@section('title', 'Create Team - SportsClub')

@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Create a New Team</h2>
            <p class="section-lead">Fill in the details to create a new team.</p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Add Team</h4>
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
                                        <label>Team Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter team name" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Sport Type</label>
                                        <select name="sport_type_id" id="sport_type" class="form-control" required>
                                            <option value="">Select Sport</option>
                                            @foreach($sports as $sport)
                                                <option value="{{ $sport->id }}" {{ (old('sport_type_id', $defaultSportId) == $sport->id) ? 'selected' : '' }}>
                                                    {{ $sport->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Coach (Optional)</label>
                                        <select name="coach_id" class="form-control">
                                            <option value="">Select Coach</option>
                                            @foreach($coaches as $coach)
                                                <option value="{{ $coach->id }}" {{ old('coach_id') == $coach->id ? 'selected' : '' }}>
                                                    {{ $coach->full_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Captain (Optional)</label>
                                        <select name="captain_id" class="form-control">
                                            <option value="">Select Captain</option>
                                            @foreach($captains as $captain)
                                                <option value="{{ $captain->id }}" {{ old('captain_id') == $captain->id ? 'selected' : '' }}>
                                                    {{ $captain->full_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Players Limit</label>
                                        <input type="number" class="form-control" id="players_limit" name="players_limit" placeholder="Max players allowed" value="{{ old('players_limit') }}" required min="1">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Select Players (Max: <span id="maxPlayers">{{ old('players_limit') ?? '0' }}</span>)</label>
                                        <div class="player-list border p-3 rounded">
                                            @foreach($players as $player)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input player-checkbox" name="players[]" value="{{ $player->id }}" id="player_{{ $player->id }}">
                                                    <label class="form-check-label" for="player_{{ $player->id }}">{{ $player->full_name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Upload Team Images</label>
                                        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                                        <small class="text-muted">You can upload multiple images (JPG, PNG, GIF, SVG).</small>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h5>Team Properties</h5>
                                        <div id="sport_properties">
                                            <!-- Team Properties  -->
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Create Team</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let sportTypeSelect = document.getElementById("sport_type");
            let propertiesContainer = document.getElementById("sport_properties");
            let maxPlayersInput = document.getElementById("players_limit");
            let maxPlayersSpan = document.getElementById("maxPlayers");
            let playerCheckboxes = document.querySelectorAll(".player-checkbox");
            let allProperties = @json($teamProperties);

            function updateSportProperties(selectedSportName) {
                propertiesContainer.innerHTML = "";
                let filteredProperties = allProperties.filter(property => property.sport_name === selectedSportName);

                if (filteredProperties.length === 0) {
                    propertiesContainer.innerHTML = "<p class='text-muted'>No properties available for this sport.</p>";
                    return;
                }

                filteredProperties.forEach(property => {
                    let inputField = "";
                    switch (property.input_type) {
                        case "text":
                            inputField = `<input type="text" class="form-control" name="team_properties[${property.id}]" placeholder="Enter ${property.name}">`;
                            break;
                        case "number":
                            inputField = `<input type="number" class="form-control" name="team_properties[${property.id}]" placeholder="Enter ${property.name}">`;
                            break;
                        case "boolean":
                            inputField = `<select class="form-control" name="team_properties[${property.id}]">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>`;
                            break;
                    }

                    propertiesContainer.innerHTML += `
                    <div class="form-group">
                        <label>${property.name}</label>
                        ${inputField}
                    </div>`;
                });
            }

            sportTypeSelect.addEventListener("change", function () {
                updateSportProperties(this.options[this.selectedIndex].text);
            });

            // users cant select players > limit
            function enforcePlayerLimit() {
                let selectedPlayers = document.querySelectorAll(".player-checkbox:checked").length;
                let maxPlayers = parseInt(maxPlayersInput.value, 10);

                if (selectedPlayers > maxPlayers) {
                    toastr.error(`You can only select up to ${maxPlayers} players!`, "Selection Limit Exceeded");
                    this.checked = false;
                }
            }

            playerCheckboxes.forEach(checkbox => {
                checkbox.addEventListener("change", enforcePlayerLimit);
            });

            maxPlayersInput.addEventListener("input", function () {
                maxPlayersSpan.textContent = this.value;
            });

        });
    </script>
@endsection
