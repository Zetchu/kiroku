<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserAlert extends Notification
{
    use Queueable;

    public function __construct(public User $newUser) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New User Registered: '.$this->newUser->name)
            ->line('A new user just joined Kiroku!')
            ->line('Name: '.$this->newUser->name)
            ->line('Email: '.$this->newUser->email)
            ->action('View Users', url('/admin/users'));
    }
}
