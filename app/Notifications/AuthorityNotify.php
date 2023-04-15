<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuthorityNotify extends Notification
{
    use Queueable;

    public $complain;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($complain)
    {
        $this->complain = $complain;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello Super Admin Sir!')
            ->subject('Complain Approved')
            ->line('A complain was approved about ' . '->' . $this->complain->subject)
            ->line('Complain by ' . $this->complain->creator)
            ->line('Approved by ' . Auth::user()->name)
            ->action('View ', url('/authComplain'))
            ->line('Thank you for using our application!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
