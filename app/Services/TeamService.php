<?php

namespace App\Services;

use App\Events\TeamCreatedOrUpdated;
use App\Models\Setting;
use App\Models\User;
use App\Repositories\TeamRepositoryInterface;
use Flasher\Laravel\Facade\Flasher;

class TeamService
{
    protected $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function getAllTeams()
    {
        return $this->teamRepository->getAllTeams();
    }

    public function getTeamById($id)
    {
        return $this->teamRepository->getTeamById($id);
    }

    public function createOrUpdateTeam(array $data)
    {
        $team = $this->teamRepository->createOrUpdateTeam($data);
        event(new TeamCreatedOrUpdated($team, $data['players'] ?? [], $data['images'] ?? [], $data['team_properties'] ?? []));
        return $team;
    }
}
