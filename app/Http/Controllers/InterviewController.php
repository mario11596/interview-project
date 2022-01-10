<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Interview;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    public function index(Request $request) {
        if (Auth::user()->is_company) {
            $id = Company::where('email_id', Auth::user()->email)->value('company_id');
            $jobs = Job::where('company_id', $id)->pluck('job_id');
            $interviews = array();

            foreach ($jobs as $job) {
                $job_interviews = Interview::where('job_id', $job)
                                            ->orderBy('date', 'asc')
                                            ->orderBy('time', 'asc')
                                            ->get();
                array_push($interviews, $job_interviews->toArray());
            }
            return view('', compact('interviews'));
        } else {
            $interviews = Interview::where('user_id', Auth::user()->id)
                                    ->orderBy('date', 'asc')
                                    ->orderBy('time', 'asc')
                                    ->get();

            return view('', compact('interviews'));
        }
    }

    public function store(Request $request, $id) {
        $user_id = Candidate::where('email_id', Auth::user()->email)->value('candidate_id');
        Interview::create(['user_id' => $user_id, 'job_id' => $id] + $request->all());

        redirect("/dashboard");
    }

    public function delete($id) {
        $user = Candidate::where('email_id', Auth::user()->email)->value('candidate_id');
        $interview = Interview::find($id)->value('user_id');
        if ($user != $interview) {
            abort(403);
        }
        Interview::where('interview_id', $id)->delete();
    }
}
