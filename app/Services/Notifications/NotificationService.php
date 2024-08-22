<?php

namespace App\Services\Notifications;

use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Notifications\Notification as FilamentNotification;

class NotificationService
{
    public function sendDBNotificationWithoutAction($user, $title, $body)
    {
        FilamentNotification::make()
            ->title($title)
            ->success()
            ->body($body)
            ->persistent()
            ->broadcast($user)
            ->sendToDatabase($user);

        event(new DatabaseNotificationsSent($user));
    }

    public function sendExeptionNotification($message = 'Please contact support team to resolve this issue.')
    {
        FilamentNotification::make()
            ->title('Something Went Wrong')
            ->danger()
            ->body($message)
            ->send();
    }

    public function sendSuccessNotification($message)
    {
        FilamentNotification::make()
            ->title('Success')
            ->success()
            ->body($message)
            ->send();
    }
}
