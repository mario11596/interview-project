<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\InformationController;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Route;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return redirect('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'company','as' => 'company.', 'middleware' => ['auth:sanctum', 'verified', 'is.company']], function(){
    Route::get('dashboard', [JobController::class, 'index'])->name('company_dashboard');
    Route::get('create', [JobController::class, 'create'])->name('create_job');
    Route::post('store', [JobController::class, 'store'])->name('store_job');
    Route::get('delete/{id}', [JobController::class, 'delete'])->name('delete_job');

    Route::get('information', [InformationController::class, 'index'])->name('index_information');
    Route::get('information/{id}/edit', [InformationController::class, 'editCompany'])->name('edit_information');
    Route::post('information/{id}', [InformationController::class, 'updateCompany'])->name('update_information');

    Route::get('interviews', [InterviewController::class, 'index'])->name('index_interviews');

    Route::get('applications', [ApplicationsController::class, 'indexCompany'])->name('index_applications');
    Route::get('applications/{applications}/close', [ApplicationsController::class, 'jobsClose'])->name('jobsClose');
    Route::get('applications/{applications}/open', [ApplicationsController::class, 'jobsOpen'])->name('jobsOpen');
    Route::get('applications/email', [ApplicationsController::class, 'email'])->name('email_applications');
    Route::post('applications/email/{id}/send', [ApplicationsController::class, 'sendEmail'])->name('email_send_applications');
});

Route::group(['prefix' => 'candidate','as' => 'candidate.', 'middleware' => ['auth:sanctum', 'verified', 'is.candidate']], function(){
    Route::get('dashboard', [JobController::class, 'index'])->name('candidate_dashboard');

    Route::get('information', [InformationController::class, 'index'])->name('index_information');
    Route::get('information/{id}/edit', [InformationController::class, 'editCandidate'])->name('edit_information');
    Route::post('information/{id}', [InformationController::class, 'updateCandidate'])->name('update_information');

    Route::get('interviews', [InterviewController::class, 'index'])->name('index_interviews');
    Route::get('interviews/create', [InterviewController::class, 'create'])->name('create_interview');
    Route::post('interviews/store', [InterviewController::class, 'store'])->name('store_interview');
    Route::get('interviews/delete/{id}', [InterviewController::class, 'delete'])->name('delete_interview');

    Route::get('information', [InformationController::class, 'index'])->name('index_information');
    Route::get('information/{id}/edit', [InformationController::class, 'editCandidate'])->name('edit_information');
    Route::post('information/{id}', [InformationController::class, 'updateCandidate'])->name('update_information');

    Route::get('applications', [ApplicationsController::class, 'indexCandidate'])->name('index_applications');
    Route::get('applications/create', [ApplicationsController::class, 'create'])->name('create_application');
    Route::post('applications/store', [ApplicationsController::class, 'store'])->name('store_application');
    Route::get('applications/email', [ApplicationsController::class, 'email'])->name('email_applications');
    Route::get('applications/{id}', [ApplicationsController::class, 'deleteCandidate'])->name('delete_applications');
    Route::post('applications/email/{id}/send', [ApplicationsController::class, 'sendEmail'])->name('email_send_applications');
});
