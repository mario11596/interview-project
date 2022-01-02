<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\InformationController;
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
});
