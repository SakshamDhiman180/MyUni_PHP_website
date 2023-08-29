<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class verificationAndpasswordReset extends Notification
{
    use Queueable;

    protected $token;
    protected $user_name;

     protected $userId;
    /**
     * Create a new notification instance.
     */
    public function __construct($user_name, $id)
    {
        //
        $this->user_name = $user_name;
        $this->userId = $id;
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Hi '.$this->user_name.',')
                    ->line('Please Verify your account and set your password!')
                    ->action('Verify your email', route('common.verifyReset', $this->userId));
                    
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
