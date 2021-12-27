<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request) {
        if (Auth::user()->is_company) {
            $id = Company::where('email_id', Auth::user()->email)->value('id');
            $jobs = Job::where('company_id', $id)->paginate($request->input('count', 10));
            return view('company_dashboard', compact('jobs'));
        } else {
            $jobs = Job::paginate($request->input('count', 10));
            return view('candidate_dashboard', compact('jobs'));
        }
    }

    public function store(Request $request) {
        $id = Company::where('email_id', Auth::user()->email)->value('id');
        Job::create(['company_id' => $id] + $request->all());
        return redirect('dashboard');
    }

    public function create() {
        return view('');
    }

    public function delete($id) {
        if (Auth::user()->is_company) {
            $company = Company::where('email_id', Auth::user()->email)->value('id');
            $job = Job::where('id', $id)->value('company_id');
            if ($company != $job) {
                abort(403);
            }
        }
        Job::where('id', $id)->delete();
    }

}
