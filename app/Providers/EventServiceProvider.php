<?php

namespace App\Providers;

use App\Events\SportCreated;
use App\Events\TeamCreatedOrUpdated;
use App\Listeners\AssignPlayersToTeamListener;
use App\Listeners\AssignPropertyValuesListener;
use App\Listeners\HandleTeamImagesListener;
use App\Listeners\SendSportCreatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        TeamCreatedOrUpdated::class => [
            AssignPlayersToTeamListener::class,
            HandleTeamImagesListener::class,
            AssignPropertyValuesListener::class,
        ],
        SportCreated::class => [
            SendSportCreatedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
