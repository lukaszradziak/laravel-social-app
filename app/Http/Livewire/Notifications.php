<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    public $count = 0;
    public $notification;

    public function getListeners()
    {
        return [
            'echo-notification:App.Models.User.'.auth()->user()->id => 'open',
            'reloadNotifications' => 'reload'
        ];
    }
 
    public function open($data)
    {
        $this->count = auth()->user()->unreadNotifications->count();
        $this->notification = $data;
    }

    public function close(){
        $this->notification = null;
    }

    public function reload()
    {
        $this->count = auth()->user()->unreadNotifications->count();
    }

    public function render()
    {
        $this->count = auth()->user()->unreadNotifications->count();
        return view('livewire.notifications');
    }
}
