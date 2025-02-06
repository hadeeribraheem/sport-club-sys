<?php

namespace App\Services;

use App\Models\SportType;
use App\Repositories\SportRepositoryInterface;

class SportService
{
    protected $sportRepository;

    public function __construct(SportRepositoryInterface $sportRepository)
    {
        $this->sportRepository = $sportRepository;
    }

    public function getAllSports()
    {
        return $this->sportRepository->getAllSports();
    }

    public function createSport(array $data)
    {
        return $this->sportRepository->createSport($data);
    }

    public function updateSport(SportType $sport, array $data)
    {
        return $this->sportRepository->updateSport($sport, $data);
    }

}
