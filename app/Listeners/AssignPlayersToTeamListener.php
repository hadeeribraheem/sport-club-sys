<?php

namespace App\Listeners;

use App\Events\TeamCreatedOrUpdated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignPlayersToTeamListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TeamCreatedOrUpdated $event)
    {
        $team = $event->team;
        $teamId = $team->id;

        // Remove **only** players who are no longer part of the team
        User::where('team_id', $teamId)->whereNotIn('id', $event->players)->update(['team_id' => null]);

        if (!empty($event->players)) {
            User::whereIn('id', $event->players)->update(['team_id' => $teamId]);
        }

        if ($team->coach_id) {
            User::where('id', $team->coach_id)->update(['team_id' => $teamId]);
        }

        if ($team->captain_id) {
            User::where('id', $team->captain_id)->update(['team_id' => $teamId]);
        }

        $team->update([
            'players_count' => User::where('team_id', $teamId)
                ->whereHas('role', function ($query) {
                    $query->where('name', 'player');
                })
                ->count(),
        ]);
    }
}
