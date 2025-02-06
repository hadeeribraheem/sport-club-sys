<?php

namespace App\Repositories;

use App\Actions\DeleteFileFromPublicAction;
use App\Filters\SportTypeIdFilter;
use App\Filters\StatusFilter;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Pipeline\Pipeline;

class TeamRepository implements TeamRepositoryInterface
{
    public function getAllTeams()
    {
        $data = Team::with(['sportType', 'coach', 'captain', 'players', 'images'])
            ->orderBy('id', 'DESC');

        $teams = app(Pipeline::class)
            ->send($data)
            ->through([
                SportTypeIdFilter::class,
                StatusFilter::class,
            ])
            ->thenReturn()
            ->get();

        $teams = TeamResource::collection($teams)->resolve();
        return $teams;
    }

    public function getTeamById($id)
    {
        return Team::with('sportType', 'coach', 'captain', 'players', 'images')->findOrFail($id);
    }

    public function createOrUpdateTeam(array $data)
    {
        return Team::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    }
    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);

        // Delete associated images if they exist
        if ($team->images) {
            foreach ($team->images as $image) {
                DeleteFileFromPublicAction::delete('images', $image->name);
                $image->delete();
            }
        }

        return $team->delete();
    }
}
