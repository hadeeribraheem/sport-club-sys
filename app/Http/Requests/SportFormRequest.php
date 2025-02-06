<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SportFormRequest extends FormRequest
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
        return [
            'sport_name'  => 'required|string|max:255|unique:sport_types,name,' . ($this->sport ? $this->sport->id : 'NULL'),
            'properties'  => 'nullable|array',
            'properties.*.name' => 'required|string|max:255',
            'properties.*.type' => 'required|in:team,individual',
            'properties.*.input_type' => 'required|in:text,number,date,boolean,dropdown',
        ];
    }
    public function messages(): array
    {
        return [
            'sport_name.required'  => 'Please enter a name for the sport.',
            'sport_name.string'    => 'The sport name must be a valid text.',
            'sport_name.max'       => 'The sport name cannot exceed 255 characters.',
            'sport_name.unique'    => 'This sport name already exists. Please choose a different sport.',
            'properties.*.name.required' => 'Each property must have a name.',
            'properties.*.name.string'   => 'Property names must be valid text.',
            'properties.*.name.max'      => 'Property names cannot exceed 255 characters.',

            'properties.*.type.required' => 'Please select whether the property is for a team or an individual.',
            'properties.*.input_type.required' => 'Each property must have an input type.',
        ];
    }
}
