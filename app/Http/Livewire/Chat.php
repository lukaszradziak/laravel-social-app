<?php

namespace App\Http\Livewire;

use App\Models\Chat as ModelsChat;
use App\Models\ChatMessage;
use Livewire\Component;

class Chat extends Component
{
    public $chats = [];

    public $activeChat;

    public $message;

    public $createModalOpen = false;
    public $createUserId;

    public function setActiveChat($id){
        $this->activeChat = ModelsChat::where('id', $id)
            ->own()
            ->first();
        
        $this->dispatchBrowserEvent('scroll-chat');
    }

    public function create(){
        $this->validate([
            'createUserId' => 'required|exists:users,id'
        ]);

        $chat = ModelsChat::create();
        $chat->users()->attach([
            auth()->user()->id, 
            $this->createUserId
        ]);

        $this->createUserId = null;
        $this->createModalOpen = false;
    }

    protected function rules()
    {
        return [
            'message' => 'required',
        ];
    }

    public function sendMessage()
    {
        $this->validate();
        
        $this->activeChat->messages()->saveMany([
            new ChatMessage([
                'user_id' => auth()->user()->id,
                'message' => $this->message
            ])
        ]);

        $this->activeChat->refresh();

        $this->message = '';
        $this->dispatchBrowserEvent('scroll-chat');
    }

    public function render()
    {
        $this->chats = ModelsChat::latest()
            ->own()
            ->get();

        return view('livewire.chat');
    }
}
