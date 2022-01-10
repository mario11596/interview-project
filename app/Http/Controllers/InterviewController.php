<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Interview;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InterviewController extends Controller
{
    public function index(Request $request) {
        if (Auth::user()->is_company) {
            $id = Company::where('email_id', Auth::user()->email)->value('company_id');

            $before = DB::table('interviews')
                ->join('jobs', 'interviews.job_id', '=', 'jobs.job_id')
                ->join('job_applications', 'jobs.job_id', '=', 'job_applications.job_id')
                ->join('users', 'interviews.user_id', '=', 'users.id')
                ->join('candidates', 'users.email', '=', 'candidates.email_id')
                ->where('jobs.company_id', '=', $id)
                ->where('date', '<', date("Y-m-d"))
                ->get();

            $after = DB::table('interviews')
                ->join('jobs', 'interviews.job_id', '=', 'jobs.job_id')
                ->join('job_applications', 'jobs.job_id', '=', 'job_applications.job_id')
                ->join('users', 'interviews.user_id', '=', 'users.id')
                ->join('candidates', 'users.email', '=', 'candidates.email_id')
                ->where('jobs.company_id', '=', $id)
                ->where('date', '>=', date("Y-m-d"))
                ->get();

            dd($before, $after);
            return view('', compact(['before', 'after']));
        } else {
            $before = DB::table('interviews')
                ->join('jobs', 'interviews.job_id', '=', 'jobs.job_id')
                ->join('job_applications', 'jobs.job_id', '=', 'job_applications.job_id')
                ->join('companies', 'jobs.company_id', '=', 'companies.company_id')
                ->where('interviews.user_id', '=', Auth::user()->id)
                ->where('date', '<', date("Y-m-d"))
                ->get();

            $after = DB::table('interviews')
                ->join('jobs', 'interviews.job_id', '=', 'jobs.job_id')
                ->join('job_applications', 'jobs.job_id', '=', 'job_applications.job_id')
                ->join('companies', 'jobs.company_id', '=', 'companies.company_id')
                ->where('interviews.user_id', '=', Auth::user()->id)
                ->where('date', '>=', date("Y-m-d"))
                ->get();

            return view('', compact(['before', 'after']));
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
