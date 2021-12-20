<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if (Auth::user()->is_company) {
            return $this->company();
        } else {
            return $this->candidate();
        }
    }

    public function company() {
        return view('company_dashboard');
    }

    public function candidate() {
        return view('candidate_dashboard');
    }
}
