<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Notifications\User\FriendsAccept;
use App\Notifications\User\FriendsRemove;
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
        $user = User::findOrFail($this->deleteFriendId);
        request()->user()->unfriend($user);
        $user->notify(new FriendsRemove());
        $this->deleteFriendId = null;
    }

    public function modalAcceptFriend($id)
    {
        $this->acceptFriendId = $id;
    }

    public function acceptFriend()
    {
        $user = User::findOrFail($this->acceptFriendId);
        request()->user()->acceptFriendRequest($user);
        $user->notify(new FriendsAccept());
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
