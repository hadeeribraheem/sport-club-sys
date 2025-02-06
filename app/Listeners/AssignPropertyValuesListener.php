<?php

namespace App\Listeners;

use App\Events\TeamCreatedOrUpdated;
use App\Models\PropertyValue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignPropertyValuesListener
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
    public function handle(TeamCreatedOrUpdated $event): void
    {
        $team = $event->team;
        $teamId = $team->id;
        $teamProperties = $event->team_properties ?? [];

        if (!empty($teamProperties)) {
            foreach ($teamProperties as $propertyId => $value) {
                PropertyValue::updateOrCreate(
                    ['property_id' => $propertyId, 'userable_type' => 'App\Models\Team', 'userable_id' => $teamId],
                    ['content' => $value]
                );
            }
        }
    }
}
