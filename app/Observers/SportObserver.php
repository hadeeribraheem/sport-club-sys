<?php

namespace App\Observers;

use App\Events\SportCreated;
use App\Models\SportType;

class SportObserver
{
    /**
     * Handle the SportType "created" event.
     */
    public function created(SportType $sportType): void
    {
        event(new SportCreated($sportType));
    }

    /**
     * Handle the SportType "updated" event.
     */
    public function updated(SportType $sportType): void
    {
        //
    }

    /**
     * Handle the SportType "deleted" event.
     */
    public function deleted(SportType $sportType): void
    {
        //
    }

    /**
     * Handle the SportType "restored" event.
     */
    public function restored(SportType $sportType): void
    {
        //
    }

    /**
     * Handle the SportType "force deleted" event.
     */
    public function forceDeleted(SportType $sportType): void
    {
        //
    }
}
