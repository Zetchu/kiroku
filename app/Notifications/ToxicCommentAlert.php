<?php

namespace App\Notifications;

use App\Models\Comments;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ToxicCommentAlert extends Notification
{
    use Queueable;

    public function __construct(public Comments $comment, public string $detectedWord) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->error()
            ->subject('⚠️ Toxic Content Detected')
            ->line("User **{$this->comment->user->name}** posted a comment containing: '{$this->detectedWord}'")
            ->line("Content: \"{$this->comment->content}\"")
            ->action('Moderation Panel', url('/admin/comments'));
    }
}
