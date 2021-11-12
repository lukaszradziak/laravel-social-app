<?php

namespace App\Notifications\Chat;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification
{
    use Queueable;

    public $user;
    public $chat;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $chat)
    {
        $this->user = $user;
        $this->chat = $chat;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
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
            'user_name' => $this->user->name,
            'user_photo' => $this->user->profile_photo_url,
            'title' => __('New message'),
            'url' => route('dashboard.chat', ['chat_id' => $this->chat->id])
        ];
    }
}
