<?php

namespace App\Services;

use App\Models\SportProperty;

class SportPropertyValidationService
{
    public static function getPropertyValidationRules(): array
    {
        $rules = [];
        $sportProperties = SportProperty::pluck('input_type', 'id')->toArray();

        foreach ($sportProperties as $propertyId => $inputType) {
            switch ($inputType) {
                case 'number':
                    $rules["player_properties.$propertyId"] = 'nullable|numeric|min:0';
                    break;
                case 'date':
                    $rules["player_properties.$propertyId"] = 'nullable|date';
                    break;
                case 'boolean':
                    $rules["player_properties.$propertyId"] = 'nullable|boolean';
                    break;
                default:
                    $rules["player_properties.$propertyId"] = 'nullable|string|max:255';
                    break;
            }
        }

        return $rules;
    }
}
