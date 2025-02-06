<?php

namespace App\Providers;

use App\Models\SportType;
use App\Observers\SportObserver;
use App\Repositories\SportRepository;
use App\Repositories\SportRepositoryInterface;
use App\Repositories\TeamRepository;
use App\Repositories\TeamRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SportRepositoryInterface::class, SportRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        SportType::observe(SportObserver::class);
    }
}
