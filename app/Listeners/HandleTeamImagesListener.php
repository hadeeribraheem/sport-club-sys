<?php

namespace App\Listeners;

use App\Actions\ImageModalSave;
use App\Events\TeamCreatedOrUpdated;
use App\traits\upload_image;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleTeamImagesListener
{
    use upload_image;
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

        if (!empty($event->images)) {
            foreach ($event->images as $image) {
                $uploadedImagePath = $this->upload($image, 'teams');
                if ($uploadedImagePath) {
                    ImageModalSave::make($team->id, 'Team', $uploadedImagePath);
                }
            }
        }
    }
}
