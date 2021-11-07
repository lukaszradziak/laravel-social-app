<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatMessage extends Component
{
    public $chat;
    public $message;

    protected $rules = [
        'message' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        
        $this->chat->messages()->saveMany([
            new \App\Models\ChatMessage([
                'user_id' => auth()->user()->id,
                'message' => $this->message
            ])
        ]);

        $this->chat->refresh();

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
