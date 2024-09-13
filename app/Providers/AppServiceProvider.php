<?php

namespace App\Providers;

use App\Services\Notifications\NotificationService;
use Filament\Notifications\Livewire\DatabaseNotifications;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        DatabaseNotifications::trigger('filament.notifications.database-notifications-trigger');
        DatabaseNotifications::pollingInterval('30s');

        $this->app->singleton(NotificationService::class, function ($app) {
            return new NotificationService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
