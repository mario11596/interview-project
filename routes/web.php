<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/candidate_dashboard', function () {
    return view('candidate_dashboard');
})->name('candidate_dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/company_dashboard', function () {
    return view('company_dashboard');
})->name('company_dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $role = Auth::user()->is_company;

    if ($role) {
        session()->put('company','1');
    }

    if (Session::has('company')) {
        return view('company_dashboard');
    } else {
        return view('candidate_dashboard');
    }
})->name('dashboard');

