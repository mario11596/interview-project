<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request) {
        if ($request->has('company_id')) {
            $return = Job::where('company_id', $request->input('company_id'))->paginate($request->input('count', 10));
        } else {
            $return = Job::paginate($request->input('count', 10));
        }
        return view('', compact('return'));
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