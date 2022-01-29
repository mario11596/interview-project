<?php

namespace App\Http\Controllers;

use App\Events\AcceptionEvent;
use App\Events\NewApplicationEvent;
use App\Mail\MailContact;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Interview;
use App\Models\Job;
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

        return view('candidate.applications-index', compact('all_jobs'));
    }


    public function indexCompany() {
        $userCheck= User::findOrFail(Auth::id());
        $user = Company::where("email_id","=",$userCheck->email)->value('company_id');

        $all_jobs = DB::table('job_applications')
                        ->join('jobs', 'job_applications.job_id', '=' ,'jobs.job_id')
                        ->join('users', 'job_applications.user_id', '=' ,'users.id')
                        ->join('candidates', 'users.email', '=' ,'candidates.email_id')
                        ->where('jobs.company_id',$user)
                        ->get();

        return view('company.applications-index', compact('all_jobs'));
    }

    public function jobsAccept($id) {

        $application = JobApplication::where('application_id', $id)->firstOrFail();
        $application->status = "Prihvaćeno";
        $application->save();

        event(new AcceptionEvent($application));

        return redirect('company/applications')->with('info', 'Uspješno zabilježena promjena statusa kandidata!');
    }

    public function jobsReject($id) {
        $application = JobApplication::where('application_id',$id)->firstOrFail();
        $application->status = "Odbijeno";
        $application->save();

        event(new AcceptionEvent($application));

        return redirect('company/applications')->with('info', 'Uspješno zabilježena promjena statusa kandidata!');
    }

    public function store(Request $request, $id) {
        $user_id = Auth::user()->id;
        $jobApplicaton = JobApplication::create([
            'user_id' => $user_id,
            'job_id' => $id,
            'message' => $request->message,
            'status' => "Čekanje"
        ]);
        $this->interviewService->store($request, $id);

        event(new NewApplicationEvent($jobApplicaton));

        return redirect("/dashboard");
    }

    public function create($id) {
        $times = $this->interviewService->getTimes($id);
        return view('candidate.application-create', compact(['times', 'id']));
    }

    public function deleteCandidate($id) {
        $job = JobApplication::where('user_id', Auth::id())->where('application_id', $id)->value('job_id');
        JobApplication::where('user_id', Auth::id())->where('application_id', $id)->delete();
        Interview::where('user_id', Auth::id())->where('job_id', $job)->delete();

        return redirect('candidate/applications')->with('success', 'Uspješno ste se odjavili za prijavu za posao!');
    }

    public function email($id){
        $userCheck= User::findOrFail(Auth::id());
        $role =  $userCheck->is_company;

        if($role){
            $candidate = User::where('id', $id)->first();
            return view('email.emailTemplateCompany', compact('candidate'));
        } else {
            $company = Company::where('company_id', $id)->first();
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
       
       if(Auth::user()->is_company){
        return redirect('company/applications')->with('success', 'Uspješno poslan e-mail!');
    } else {
        return redirect('candidate/applications')->with('success', 'Uspješno poslan e-mail!');
    }
       
    }

    public function showCandidate($id){
        $user_id = JobApplication::where('application_id', $id)->value('user_id');
        $job_id = JobApplication::where('application_id', $id)->value('job_id');
        $user_check = User::where('id', $user_id)->value('email');
        $candidate = Candidate::where('email_id', $user_check)->first();
        $message = JobApplication::where('application_id', $id)->value('message');

        return view('company.applications-show', compact(['candidate', 'message']));
    }


    public function showCompany($id){
        $company = Company::where('company_id',$id)->first();

        return view('candidate.applications-show', compact('company'));
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
