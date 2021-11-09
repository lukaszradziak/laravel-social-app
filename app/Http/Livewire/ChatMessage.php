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
        ];
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
