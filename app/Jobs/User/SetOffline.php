<?php

namespace App\Jobs\User;

use App\Events\UserStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SetOffline implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    private function jobIsActive(){
        if($this->job->getJobId() === $this->user->is_online_queue_id){
            return true;
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(!$this->jobIsActive()){
            return;
        }

        $this->user->update([
            'is_online' => false,
            'is_online_queue_id' => null
        ]);
        
        broadcast(new UserStatus($this->user->id, false));
    }
}
