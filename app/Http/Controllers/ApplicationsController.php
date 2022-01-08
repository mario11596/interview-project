<?php

namespace App\Http\Controllers;

use App\Events\AcceptionEvent;
use App\Events\NewApplicationEvent;
use App\Mail\MailContact;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\JobApplication;
use App\Models\User;
use App\Notifications\Acception;
use App\Services\InterviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApplicationsController extends Controller
{
    protected $interviewService;

    public function __construct(InterviewService $interviewService) {
        $this->interviewService = $interviewService;
    }
    public function indexCandidate() {
        $all_jobs = DB::table('job_applications')
                        ->where('user_id', Auth::id())
                        ->join('jobs', 'job_applications.job_id', '=' ,'jobs.job_id')
                        ->join('companies','companies.company_id','=', 'jobs.company_id')
                        ->get();


        return view('', compact('all_jobs'));
    }


    public function indexCompany() {
        $userCheck= User::findOrFail(Auth::id());
        $user = Company::where("email_id","=",$userCheck->email)->get()->first();

        $all_jobs = DB::table('job_applications')
                        ->join('jobs', 'job_applications.job_id', '=' ,'jobs.job_id')
                        ->join('candidates', 'job_applications.user_id', '=' ,'candidates.candidate_id')
                        ->where('jobs.company_id',$user->id)
                        ->get();
        $all_jobs->groupBy('user_id');

        return view('', compact('all_jobs'));
    }

    public function jobsClose($id) {

        $application = JobApplication::where('application_id',$id)->firstOrFail();
        $application->status = "Odobreno";
        $application->save();


        event(new AcceptionEvent($application));
        //$application->notify(new Acception($application));

        return redirect('applications');
    }

    public function jobsOpen($id) {
        $application = JobApplication::where('application_id',$id)->firstOrFail();
        $application->status = "Cekanje";
        $application->save();


        return redirect('applications');
    }

    public function store(Request $request) {
        $id = Candidate::where('email_id', Auth::user()->email)->value('candidate_id');
        $jobApplicaton = JobApplication::create(['user_id' => $id] + $request->all());

        event(new NewApplicationEvent($jobApplicaton));

        return redirect('dashboard');
    }

    public function create(Request $request) {
        //return view('');
        $job_id = $request->input('job_id');
        $times = $this->interviewService->getTimes($job_id);
        return view('', compact($times));
    }

    public function deleteCandidate($id) {
        JobApplication::where('user_id', Auth::id())->where('application_id',$id)->delete();

        return redirect('applications');
    }

    public function email(){
        $userCheck= User::findOrFail(Auth::id());
        $role =  $userCheck->is_company;

        if($role){
            return view('email.emailTemplate');
        } else {
            return view('email.emailTemplateCandidate');
        }
    }

    public function sendEmail(Request $request, $id) {

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        if(Auth::user()->is_company){
            $userTo = Candidate::findOrFail($id);
        } else {
            $userTo = Company::findOrFail($id);
        }
       $userTo_email = $userTo->email_id;

       Mail::to($userTo_email)->send(new MailContact($request));
       return redirect('applications/email');
       //return response()->json(['message' => 'Request completed']);
    }
}
