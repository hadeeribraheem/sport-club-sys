<?php

namespace App\Listeners;

use App\Events\SportCreated;
use App\Models\User;
use App\Notifications\SendSportNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSportCreatedNotification
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
    public function handle(SportCreated $event): void
    {
        // notification for all admins --> new sport
        $admins = User::whereHas('role', function ($query) {
                        $query->where('name', 'admin');
                    })->get();

        foreach ($admins as $admin) {
            $admin->notify(new SendSportNotification($event->sport));
        }
    }
}
