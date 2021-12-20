<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index() {
        if (Auth::user()->is_company) {
            return view('company_dashboard');
        } else {
            return view('candidate_dashboard');
        }
    }

    public function company() {
        if (Gate::forUser(Auth::user())->denies('is_company')) {
            abort(403);
        } else {
            return view('company_dashboard');
        }
    }

    public function candidate() {
        if (Gate::forUser(Auth::user())->allows('is_company')) {
            abort(403);
        } else {
            return view('candidate_dashboard');
        }
    }
}
