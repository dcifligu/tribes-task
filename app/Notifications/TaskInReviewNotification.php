<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskInReviewNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
     protected $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Task in Review Notification')
            ->line('A task you created is now in review.')
            ->action('View Task', route('tasks.show', $this->task))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
