<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role->name === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'default_sport_id' => 'exists:sport_types,id',
            'max_users_per_team' => 'required|integer|min:3',
        ];
    }
    public function messages()
    {
        return [
            'default_sport_id.exists' => 'Select a valid sport.',
            'max_users_per_team.required' => 'The max users per team field is required.',
            'max_users_per_team.integer' => 'The max users per team must be a valid number.',
            'max_users_per_team.min' => 'The max users per team must be at least 3.',
        ];
    }
}
