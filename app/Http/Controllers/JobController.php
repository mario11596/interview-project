<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request) {
        if (Auth::user()->is_company) {
            $id = Company::where('email_id', Auth::user()->email)->value('company_id');
            $jobs = Job::where('company_id', $id)->paginate($request->input('count', 10));
            return view('company_dashboard', compact('jobs'));
        } else {
            $jobs = Job::paginate($request->input('count', 10));
            return view('candidate_dashboard', compact('jobs'));
        }
    }

    public function store(Request $request) {
        $id = Company::where('email_id', Auth::user()->email)->value('company_id');
        Job::create(['company_id' => $id] + $request->all());
        return redirect('dashboard');
    }

    public function create() {
        return view('company.job-create');
    }

    public function delete($id) {
        if (Auth::user()->is_company) {
            $company = Company::where('email_id', Auth::user()->email)->value('company_id');
            $job = Job::where('job_id', $id)->value('company_id');
            if ($company != $job) {
                abort(403);
            }
        }
        Job::where('job_id', $id)->delete();
        return redirect('dashboard');
    }

    public function search(Request $request){
        $search = $request->input('search') ?: "";

        $jobs = Job::query()
        ->where('user_id', Auth::id())
        ->where(function(Builder $builder) use ($search){
            $builder->where('position', 'LIKE', "%{$search}%");
        })
        ->orderBy('job_id')
        ->get();

        if(count($jobs) > 0){
            if(Auth::user()->is_company){
                return view('company_dashboard', compact('jobs','search'));
            } else {
                return view('candidate_dashboard', compact('jobs','search'));
            }
        } else {
            if(Auth::user()->is_company){
                return redirect('company_dashboard')->with('warning', 'Nema tražene pozicije!');
            } else {
                return redirect('candidate_dashboard')->with('warning', 'Nema tražene pozicije!');
            }
        }
    }
}
