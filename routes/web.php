<?php

use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'company','as' => 'company.', 'middleware' => ['auth:sanctum', 'verified', 'is.company']], function(){
    Route::get('dashboard', [HomeController::class, 'company'])->name('company_dashboard');
    Route::get('information', [InformationController::class, 'index'])->name('index');
    Route::get('information/{id}/edit', [InformationController::class, 'editCompany'])->name('edit');
    Route::post('information/{id}', [InformationController::class, 'updateCompany'])->name('update');
});

Route::group(['prefix' => 'candidate','as' => 'candidate.', 'middleware' => ['auth:sanctum', 'verified', 'is.candidate']], function(){
    Route::get('dashboard', [HomeController::class, 'candidate'])->name('candidate_dashboard');
    Route::get('information', [InformationController::class, 'index'])->name('index');
    Route::get('information/{id}/edit', [InformationController::class, 'editCandidate'])->name('edit');
    Route::post('information/{id}', [InformationController::class, 'updateCandidate'])->name('update');
});
