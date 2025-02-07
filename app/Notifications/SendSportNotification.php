<?php

namespace App\Notifications;

use App\Models\SportType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSportNotification extends Notification
{
    use Queueable;
    public $sport;

    /**
     * Create a new notification instance.
     */
    public function __construct(SportType $sport)
    {
        $this->sport = $sport;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Sport Added',
            'sport_id' => $this->sport->id,
            'sport_name' => $this->sport->name,
            'message' => "A new sport has been added: {$this->sport->name}",
            'created_at' => now(),
        ];
    }
}
