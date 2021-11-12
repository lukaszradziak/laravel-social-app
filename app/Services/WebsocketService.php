<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Jobs\User\SetOffline;
use App\Jobs\User\SetOnline;
use App\Models\User;

class WebsocketService 
{
	private $request;

	public function setRequest(Request $request)
	{
		$this->request = $request;
		return $this;
	}

	private function getChannelName($event)
	{
		$name = explode('.', $event['channel']);
		array_pop($name);
		return join('.', $name);
	}

	private function getChannelId($event)
	{
		$name = explode('.', $event['channel']);
		return array_pop($name);
	}

	private function decodeEvent($event)
	{
		$name = $this->getChannelName($event);
		$id = $this->getChannelId($event);

		if($name === 'private-App.Models.User'){
			$user = User::find($id);

			if($event['name'] === 'channel_occupied'){

				$user->update(['is_online_queue_id' => null]);
				if(!$user->is_online){
					dispatch(new SetOnline($user));
				}

			} else if($event['name'] === 'channel_vacated'){

				$user->update(['is_online_queue_id' => null]);
				$queueId = app(\Illuminate\Contracts\Bus\Dispatcher::class)
					->dispatch((new SetOffline($user))->delay(now()->addSeconds(3)));
				$user->update(['is_online_queue_id' => $queueId]);

			}

		} else if($name === 'presence-chat'){
			$user = User::find($event['user_id']);

			if($event['name'] === 'member_added'){

				$user->update(['active_chat_id' => $id]);

			} else if($event['name'] === 'member_removed'){

				$user->update(['active_chat_id' => null]);
				
			}

		}
	}

	public function handle()
	{
		foreach($this->request->get('events') as $event){
			$this->decodeEvent($event);
		}
	}
}