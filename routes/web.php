<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\NotificationsController;
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
    Route::get('dashboard/{id}', [JobController::class, 'details'])->name('job_details');
    Route::get('create', [JobController::class, 'create'])->name('create_job');
    Route::post('store', [JobController::class, 'store'])->name('store_job');
    Route::get('delete/{id}', [JobController::class, 'delete'])->name('delete_job');
    Route::get('edit/{id}', [JobController::class, 'edit'])->name('edit_job');
    Route::post('update/{id}', [JobController::class, 'update'])->name('update_job');
    Route::get('search', [JobController::class, 'searchCompany'])->name('search');

    Route::get('information', [InformationController::class, 'index'])->name('index_information');
    Route::get('information/{id}/edit', [InformationController::class, 'editCompany'])->name('edit_information');
    Route::post('information/{id}', [InformationController::class, 'updateCompany'])->name('update_information');
    Route::get('information/delete/photo/{id}', [InformationController::class, 'destroyPhoto'])->name('destroy_photo');

    Route::get('interviews', [InterviewController::class, 'index'])->name('index_interviews');

    Route::get('applications', [ApplicationsController::class, 'indexCompany'])->name('index_applications');
    Route::get('applications/{id}/show', [ApplicationsController::class, 'showCandidate'])->name('show_applications');
    Route::get('information/show/PDF/{id}', [ApplicationsController::class, 'showPDF'])->name('show_pdf');
    Route::get('applications/{applications}/accept', [ApplicationsController::class, 'jobsAccept'])->name('jobsAccept');
    Route::get('applications/{applications}/reject', [ApplicationsController::class, 'jobsReject'])->name('jobsReject');
    Route::get('applications/email/{id}', [ApplicationsController::class, 'email'])->name('email_applications');
    Route::post('applications/email/{id}/send', [ApplicationsController::class, 'sendEmail'])->name('email_send_applications');

    Route::get('notifications', [NotificationsController::class, 'notificationIndex'])->name('notificationIndex');
    Route::get('notifications/mark', [NotificationsController::class, 'notificationMark'])->name('notificationMark');
    Route::get('notifications/{id}', [NotificationsController::class, 'notificationMarkOne'])->name('notificationMarkOne');
});

Route::group(['prefix' => 'candidate','as' => 'candidate.', 'middleware' => ['auth:sanctum', 'verified', 'is.candidate']], function(){
    Route::get('dashboard', [JobController::class, 'index'])->name('candidate_dashboard');
    Route::get('dashboard/{id}', [JobController::class, 'details'])->name('job_details');
    Route::get('dashboard/{id}/apply', [ApplicationsController::class, 'create'])->name('create_application');
    Route::post('dashboard/{id}/store', [ApplicationsController::class, 'store'])->name('store_application');
    Route::get('search', [JobController::class, 'searchCandidate'])->name('search');
    
    Route::get('information', [InformationController::class, 'index'])->name('index_information');
    Route::get('information/{id}/edit', [InformationController::class, 'editCandidate'])->name('edit_information');
    Route::get('information/delete/photo/{id}', [InformationController::class, 'destroyPhoto'])->name('destroy_photo');
    Route::post('information/{id}', [InformationController::class, 'updateCandidate'])->name('update_information');
    Route::get('information/delete/{id}', [InformationController::class, 'destroyPDF'])->name('destroy_pdf');
    Route::get('information/PDF/{id}', [InformationController::class, 'showPDF'])->name('show_pdf');

    Route::get('interviews', [InterviewController::class, 'index'])->name('index_interviews');
    Route::get('interviews/delete/{id}', [InterviewController::class, 'delete'])->name('delete_interview');

    Route::get('applications', [ApplicationsController::class, 'indexCandidate'])->name('index_applications');
    Route::get('applications/{id}/show', [ApplicationsController::class, 'showCompany'])->name('show_applications');
    Route::get('applications/email', [ApplicationsController::class, 'email'])->name('email_applications');
    Route::get('applications/create/{id}', [ApplicationsController::class, 'create'])->name('create_application');
    Route::post('applications/store/{id}', [ApplicationsController::class, 'store'])->name('store_application');
    Route::get('applications/email/{id}', [ApplicationsController::class, 'email'])->name('email_applications');
    Route::get('applications/{id}', [ApplicationsController::class, 'deleteCandidate'])->name('delete_applications');
    Route::post('applications/email/{id}/send', [ApplicationsController::class, 'sendEmail'])->name('email_send_applications');

    Route::get('notifications', [NotificationsController::class, 'notificationIndex'])->name('notificationIndex');
    Route::get('notifications/mark', [NotificationsController::class, 'notificationMark'])->name('notificationMark');
    Route::get('notifications/{id}', [NotificationsController::class, 'notificationMarkOne'])->name('notificationMarkOne');
});
