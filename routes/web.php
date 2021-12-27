<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'company', 'middleware' => ['auth:sanctum', 'verified', 'is.company']], function(){
    Route::get('dashboard', [HomeController::class, 'company'])->name('company_dashboard');
    Route::get('index', [JobController::class, 'index'])->name('index_company_jobs');
    Route::get('create', [JobController::class, 'create'])->name('create_job');
    Route::post('store', [JobController::class, 'store'])->name('store_job');
    Route::get('delete/{id}', [JobController::class, 'delete'])->name('delete_job');
});

Route::group(['prefix' => 'candidate', 'middleware' => ['auth:sanctum', 'verified', 'is.candidate']], function(){
    Route::get('dashboard', [HomeController::class, 'candidate'])->name('candidate_dashboard');
    Route::get('index', [JobController::class, 'index'])->name('index_jobs');
});

