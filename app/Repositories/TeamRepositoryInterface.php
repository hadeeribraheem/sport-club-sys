<?php

namespace App\Repositories;

interface TeamRepositoryInterface
{
    public function getAllTeams();
    public function getTeamById($id);
    public function createOrUpdateTeam(array $data);
    public function deleteTeam($id);

}
