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
        $company_job = Job::where('job_id', $event->jobApplicaton->job_id)->value('company_id');
        $company_email = Company::where('company_id', $company_job)->value('email_id');
        $company = User::where('email', $company_email)->first();

        $user_email = User::find($event->jobApplicaton->user_id)->value('email');
        $jobApplicaton = Candidate::where('email_id', $user_email)->first();


        Notification::send($company, new NewApplication($jobApplicaton));
    }
}
