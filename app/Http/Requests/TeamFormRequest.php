<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;

class TeamFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $maxUsersPerTeam = ( Setting::first()->max_users_per_team) - 2 ; // this 2 is the other roles in team not player (coach/captain)

        return [
            'name' => 'required|string|max:255|unique:teams,name,' . ($this->team ? $this->team->id : 'NULL'),
            'sport_type_id' => 'required|exists:sport_types,id',
            'coach_id' => 'nullable|exists:users,id',
            'captain_id' => 'nullable|exists:users,id',
            'players_limit' => 'required|integer|min:1|max:' . $maxUsersPerTeam,
            'players' => 'nullable|array',
            'players.*' => 'exists:users,id',
            'status' => 'required|in:active,inactive',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'team_properties' => 'nullable|array',
            'team_properties.*' => 'string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Team name is required.',
            'name.unique' => 'This team name is already taken.',
            'sport_type_id.required' => 'Sport type is required.',
            'players_limit.required' => 'Please specify the player limit.',
            'players_limit.min' => 'Team must have at least one player.',
            'players.array' => 'Invalid format for player selection.',
            'players.*.exists' => 'One or more selected players are invalid.',
            'status.required' => 'Team status is required.',
            'status.in' => 'Invalid status selected.',
            'images.*.image' => 'Each file must be a valid image.',
            'images.*.mimes' => 'Only JPG, JPEG, PNG, SVG, and GIF formats are allowed.',
            'images.*.max' => 'Each image must not exceed 2MB.',
            'team_properties.array' => 'Invalid format for team properties.',
            'team_properties.*.string' => 'Each team property must be a valid value.',
            'team_properties.*.max' => 'Each team property value cannot exceed 255 characters.',
        ];
    }
}
