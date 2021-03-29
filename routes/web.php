<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use  App\Http\Controllers\CohortController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThreadController;
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
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/createcohort', function() { return view('create-cohort'); })->name('createcohort');
    Route::get('/cohorts/{cohort}/createsummary', [ThreadController::class, 'getCreate'])->name('createsummary');
});


Route::get('/cohorts/{cohort}/week/{week}', [ThreadController::class, 'showByWeek'])->name('weeklysummary');
Route::post('/cohorts/{cohort}/week/{week}', [CommentController::class, 'comment']);
Route::get('/cohorts/{cohort}/latestsummary', [ThreadController::class, 'getLatest'])->name('latestsummary');
Route::get('/cohorts/{cohort}', [CohortController::class, 'showOne'])->name('cohort.page');


require __DIR__.'/auth.php';
