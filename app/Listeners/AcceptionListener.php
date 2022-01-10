<?php

namespace App\Listeners;

use App\Events\AcceptionEvent;
use App\Models\Job;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

use App\Models\JobApplication;
use App\Notifications\Acception;
use Illuminate\Support\Facades\DB;

class AcceptionListener
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
     * @param  \App\Events\AcceptionEvent  $event
     * @return void
     */
    public function handle(AcceptionEvent $event)
    {
        $user = User::findOrFail($event->application->user_id);

        $applicaton_job = DB::table('job_applications')
                        ->where('user_id', $event->application->user_id)
                        ->where('application_id', $event->application->application_id)
                        ->value('job_id');
                 
        $applicaton = Job::where('job_id', $applicaton_job)->first();
        
        Notification::send($user, new Acception($applicaton));
    }
}
