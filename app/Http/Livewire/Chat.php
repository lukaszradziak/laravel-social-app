<?php

namespace App\Http\Livewire;

use App\Rules\ChatUnique;
use Illuminate\Http\Request;
use Livewire\Component;

class Chat extends Component
{
    public $activeChat;
    public $chats = [];

    public $modalOpen = false;

    public $userId;
    public $message;

    protected function rules()
    {
        return [
            'userId' => [
                'required',
                'exists:users,id',
                'not_in:'.auth()->user()->id,
                new ChatUnique($this->userId),
            ],
            'message' => 'required'
        ];
    }

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

    public function render(Request $request)
    {
        $this->chats = \App\Models\Chat::own()
            ->orderBy('updated_at', 'desc')
            ->get();

        if($request->get('chat_id')){
            $this->setActiveChat($request->get('chat_id'));
        }

        return view('livewire.chat');
    }
}
