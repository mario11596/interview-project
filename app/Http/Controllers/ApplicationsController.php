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
                        ->join('jobs', 'job_applications.job_id', '=' ,'jobs.id')
                        ->join('companies','companies.id','=', 'jobs.company_id')
                        ->get();

        
        return view('candidate.applications-index', compact('all_jobs'));
    }


    public function indexCompany() {
        $userCheck= User::findOrFail(Auth::id());
        $user = Company::where("email_id","=",$userCheck->email)->value('id');

        $all_jobs = DB::table('job_applications')
                        ->join('jobs', 'job_applications.job_id', '=' ,'jobs.id')
                        ->join('users', 'job_applications.user_id', '=' ,'users.id')
                        ->join('candidates', 'users.email', '=' ,'candidates.email_id')
                        ->select('job_applications.*','users.*','candidates.*','jobs.*', 'job_applications.id as app_job_id')
                        ->where('jobs.company_id',$user)
                        ->get();
        
        //dd($all_jobs);
        return view('company.applications-index', compact('all_jobs'));
    }

    public function jobsClose($id) {

        $application = JobApplication::where('id',$id)->firstOrFail();
        $application->status = "Odobreno";
        $application->save();

        
        event(new AcceptionEvent($application));
        //$application->notify(new Acception($application));

        return redirect('company/applications');
    }

    public function jobsOpen($id) {
        $application = JobApplication::where('id',$id)->firstOrFail();
        $application->status = "Cekanje";
        $application->save();


        return redirect('company/applications');
    }

    public function store(Request $request) {
        $id = Candidate::where('email_id', Auth::user()->email)->value('id');
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
        JobApplication::where('user_id', Auth::id())->where('id',$id)->delete();

        return redirect('candidate/applications');
    }

    public function email($id){
        $userCheck= User::findOrFail(Auth::id());
        $role =  $userCheck->is_company;
        //$company = Company::where('id', $id)->first();
    
        if($role){
            $candidate = User::where('id', $id)->first();
            //dd($candidate);
            return view('email.emailTemplateCompany', compact('candidate'));
        } else {
            $company = Company::where('id', $id)->first();
            return view('email.emailTemplateCandidate', compact('company'));
        }
    }

    public function sendEmail(Request $request, $id) {

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        if(Auth::user()->is_company){
            $userTo = User::findOrFail($id);
            $user_email = $userTo->email;
        } else {
            $userTo = Company::findOrFail($id);
            $user_email = $userTo->email_id;
        }
       $userTo_email = $user_email;
      
       Mail::to($userTo_email)->send(new MailContact($request));
       //return redirect('candidate.applications/email');
       if(Auth::user()->is_company){
        return redirect('company/applications');
    } else {
        return redirect('candidate/applications');
    } 
       //return response()->json(['message' => 'Request completed']);
    }

    public function showCandidate($id){ 
        $user_check = User::where('id', $id)->value('email');
        $candidate = Candidate::where('email_id',$user_check)->first();
        
        return view('company.applications-show', compact('candidate'));
    }
    
    public function showPDF($id){
        $pathToFile = public_path().'/files/uploads/'.$id.'.pdf';

        if (file_exists($pathToFile)) {

        $headers = [
            'Content-Type' => 'application/pdf'
        ];
            return response()->file($pathToFile);
        }
    }
}
