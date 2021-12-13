<?php

namespace App\Http\Livewire;

use App\Events\Chat\NewMessage;
use Livewire\Component;

class ChatMessage extends Component
{
    public $chat;
    public $message;

    protected $rules = [
        'message' => 'required',
    ];

    public function getListeners()
    {
        return [
            "echo-private:chat.{$this->chat->id},Chat\NewMessage" => 'newMessage',
            "echo-presence:chat.{$this->chat->id},here" => "here",
        ];
    }

    public function here()
    {
    }

    public function newMessage()
    {
        $this->chat->refresh();
        $this->dispatchBrowserEvent('scroll-chat');
    }

    public function submit()
    {
        $this->validate();

        $this->chat->messages()->saveMany([
            new \App\Models\ChatMessage([
                'user_id' => auth()->user()->id,
                'message' => $this->message
            ])
        ]);

        $this->chat->touch();

        broadcast(new NewMessage($this->chat->id))->toOthers();

        foreach ($this->chat->users as $user) {
            if (!$user->is_online) {
                continue;
            }

            if ($user->id === auth()->user()->id) {
                continue;
            }

            if ($user->active_chat_id === $this->chat->id) {
                continue;
            }

            $user->notify(new \App\Notifications\Chat\NewMessage($this->chat));
        }


        $this->message = '';
        $this->dispatchBrowserEvent('scroll-chat');
    }

    public function mount($chat)
    {
        $this->chat = $chat;
    }

    public function render()
    {
        return view('livewire.chat-message');
    }
}
