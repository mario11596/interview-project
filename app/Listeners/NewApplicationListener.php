<?php

namespace App\Listeners;

use App\Events\NewApplicationEvent;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NewApplicationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewApplicationEvent  $event
     * @return void
     */
    public function handle(NewApplicationEvent $event){
        
        $user_email = User::where('id', $event->jobApplicaton->user_id)->value('email_id');
        $user = Candidate::where('email_id', $user_email);

        Notification::send($user, new NewApplicationEvent($event->jobApplicaton));
    }
}
