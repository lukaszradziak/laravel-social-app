<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $activeChat;
    public $chats = [];

    public $modalOpen = false;

    public $userId;
    public $message;

    protected $rules = [
        'userId' => 'required|exists:users,id',
        'message' => 'required'
    ];

    public function setActiveChat($id)
    {
        $this->activeChat = \App\Models\Chat::where('id', $id)
            ->own()
            ->first();
        
        $this->dispatchBrowserEvent('scroll-chat');
    }

    public function submit()
    {
        $this->validate();

        $chat = \App\Models\Chat::create();
        $chat->users()->attach([auth()->user()->id, $this->userId]);
        $chat->messages()->saveMany([
            new \App\Models\ChatMessage([
                'user_id' => auth()->user()->id,
                'message' => $this->message
            ])
        ]);

        $this->userId = null;
        $this->message = '';
        $this->modalOpen = false;
        $this->activeChat = $chat;
    }

    public function render()
    {
        $this->chats = \App\Models\Chat::latest()
            ->own()
            ->get();

        return view('livewire.chat');
    }
}
