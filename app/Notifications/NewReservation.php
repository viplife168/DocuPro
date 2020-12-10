<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReservation extends Notification
{
    use Queueable;
    private $notifData;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$notifData)
    {
        $this->user = $user;
        $this->notifData = $notifData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->greeting($this->notifData['name'])
                ->line($this->notifData['body'])
                ->action($this->notifData['offerText'], $this->notifData['offerUrl'])
                ->line($this->notifData['thanks']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'name' => $this->user->name,
            'offer_id' => $this->notifData['offer_id']
        ];
    }
}
