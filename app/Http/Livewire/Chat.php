<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $rooms = [
        [
           'user' => 'John Doe',
           'message' => 'Hi there, How are you?',
           'time' => '9:00',
           'count' => 0,
           'online' => true,
        ],
        [
           'user' => 'Jessi Woo',
           'message' => 'Working with you like dream!',
           'time' => '8:50',
           'count' => 5,
           'online' => false,
        ],
        [
           'user' => 'Amelia Nelson',
           'message' => 'Hello mate! Great day',
           'time' => '8:30',
           'count' => 4,
           'online' => false,
        ]
    ];

    public $activeChat = [
        'user' => 'John Doe',
        'messages' => [
           [
              'message' => 'Hi there, How are you?',
              'own' => false,
           ],
           [
              'message' => 'Waiting for your reply. As I Have to go back soon. I have to travel long distance.',
              'own' => false,
           ],
           [
              'message' => 'Hi, I am coming there in few minutes. Please wait! I am in taxi right now.',
              'own' => true
           ],
           [
              'message' => 'Thank you very much, I am waiting here at StarBucks cafe.',
              'own' => false,
           ]
        ]
    ];

    public $message;

    protected function rules()
    {
        return [
            'message' => 'required',
        ];
    }

    public function sendMessage()
    {
        $this->validate();
        
        $this->activeChat['messages'][] = [
            'message' => $this->message,
            'own' => true
        ];
        $this->message = '';
        $this->dispatchBrowserEvent('new-message');
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
