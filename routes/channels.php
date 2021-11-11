<?php

use App\Models\Chat;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('user', function ($user) {
    if($user){
        return true;
    }
});

Broadcast::channel('chat.{chatId}', function ($user, $chatId) {
    if(Chat::where('id', $chatId)->own($user)->count()){
        return ['id' => $user->id, 'name' => $user->name];
    }
});