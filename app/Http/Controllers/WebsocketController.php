<?php

namespace App\Http\Controllers;

use App\Events\UserStatus;
use App\Models\User;
use Illuminate\Http\Request;

class WebsocketController extends Controller
{
    public function hooks(Request $request)
    {
        foreach($request->get('events') as $event){
            if(strpos($event['channel'], 'private-App.Models.User.') !== false){
                $id = (int)str_replace('private-App.Models.User.', '', $event['channel']);
                $user = User::find($id);
                if($event['name'] === 'channel_occupied'){
                    $user->update(['is_online' => true]);
                    broadcast(new UserStatus($user->id, true));
                } else if($event['name'] === 'channel_vacated'){
                    $user->update(['is_online' => false]);
                    broadcast(new UserStatus($user->id, false));
                }
            }
        }
    }
}
