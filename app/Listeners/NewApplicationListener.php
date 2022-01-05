<?php

namespace App\Listeners;

use App\Events\NewApplicationEvent;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use App\Notifications\NewApplication;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
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
        
        $company_email = JobApplication::where('id', $event->jobApplicaton->id)->value('job_id');
        $company_job = Job::where('id', $company_email)->value('company_id');
        $company = Company::where('id', $company_job)->first();

        $user_application = User::where('id',  $event->jobApplicaton->user_id)->value('email_id');
        $jobApplicaton = Candidate::where('email_id', $user_application)->first;


        Notification::send($company, new NewApplication($jobApplicaton));
    }
}
