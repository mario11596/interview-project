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
            $id = Company::where('email_id', Auth::user()->email)->value('id');
            $jobs = Job::where('company_id', $id)->pluck('id');
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
            $id = Candidate::where('email_id', Auth::user()->email)->value('id');
            $interviews = Interview::where('user_id', $id)
                                    ->orderBy('date', 'asc')
                                    ->orderBy('time', 'asc')
                                    ->get();

            return view('', compact('interviews'));
        }
    }

    public function store(Request $request) {
        $id = Candidate::where('email_id', Auth::user()->email)->value('id');
        Interview::create(['user_id' => $id] + $request->all());
    }

    public function create() {
        return view('');
    }

    public function delete($id) {
        $user = Candidate::where('email_id', Auth::user()->email)->value('id');
        $interview = Interview::find($id)->value('user_id');
        if ($user != $interview) {
            abort(403);
        }
        Interview::where('id', $id)->delete();
    }

    //Nemam pojma što ovdje radim
    public function getTimes(Request $request) {
        $company = Job::find($request->input('job_id'))->value('company_id');
        $jobs = Job::where('company_id', $company)->pluck('id');
        $taken_times = array();

        foreach ($jobs as $job) {
            $job_times = Interview::where('job_id', $job)
                                    ->where('date', $request->input('date'))
                                    ->pluck('time');
            $int_times = array();
            //Ovaj dio je jako ružan i jako mi se ne dopada
            foreach ($job_times->toArray() as $time_str) {
                $time = strtotime($time_str);
                $int_times[] = intval(date('h.i', $time));
            }
            $taken_times = array_merge($taken_times, $int_times);
        }

        $available_times = range(8, 18); //ajmo ovo trpati u bazu
        $free_times = array_diff($available_times, $taken_times);

        return array_values($free_times);
    }

}
