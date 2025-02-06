<?php

namespace App\Repositories;

use App\Models\SportProperty;
use App\Models\SportType;

class SportRepository implements SportRepositoryInterface
{
    public function getAllSports()
    {
        return SportType::with('properties')->get();
    }

    public function createSport(array $data)
    {
        $sport = SportType::create(['name' => $data['sport_name']]);

        if (!empty($data['properties'])) {
            foreach ($data['properties'] as $property) {
                SportProperty::create([
                    'sport_id'   => $sport->id,
                    'name'       => $property['name'],
                    'type'       => $property['type'],  // team or individual
                    'input_type' => $property['input_type'],
                ]);
            }
        }

        return $sport;
    }

    public function updateSport(SportType $sport, array $data)
    {
        // not implemented yet
    }

}

