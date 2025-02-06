<?php

namespace App\Repositories;

use App\Models\SportType;

interface SportRepositoryInterface
{
    public function getAllSports();
    public function createSport(array $data);
    public function updateSport(SportType $sport, array $data);
}
