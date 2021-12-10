<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Friends extends Component
{
    use WithPagination;

    public $acceptFriendId;
    public $deleteFriendId;

    public function modalDeleteFriend($id)
    {
        $this->deleteFriendId = $id;
    }

    public function deleteFriend()
    {
        request()->user()->unfriend(User::find($this->deleteFriendId));
        $this->deleteFriendId = null;
    }

    public function modalAcceptFriend($id)
    {
        $this->acceptFriendId = $id;
    }

    public function acceptFriend()
    {
        request()->user()->acceptFriendRequest(User::find($this->acceptFriendId));
        $this->acceptFriendId = null;
    }


    public function render()
    {
        return view('livewire.friends', [
            'friends' => request()->user()->getFriends(8),
            'friendRequests' => request()->user()->getFriendRequests()
        ]);
    }
}
