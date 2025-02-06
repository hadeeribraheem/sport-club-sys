<?php

namespace App\Http\Requests;

use App\Services\SportPropertyValidationService;
use Illuminate\Foundation\Http\FormRequest;

class SaveUserInfoFormRequest extends FormRequest
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
        $rules = [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'age' => 'required|integer|min:1',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|string',
            'team_id' => 'nullable|exists:teams,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'player_properties' => 'nullable|array',
        ];
        return array_merge($rules, SportPropertyValidationService::getPropertyValidationRules());

    }


}
