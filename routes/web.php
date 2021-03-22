<?php

use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/{cohort}/week/{week}', [ThreadController::class, 'showByWeek'])->middleware(['auth'])->name('weeklysummary');
Route::post('/{cohort}/week/{week}', [CommentController::class, 'comment']);
Route::get('/{cohort}/latestsummary', [ThreadController::class, 'getLatest'])->middleware(['auth'])->name('latestsummary');
Route::get('/createsummary', [ThreadController::class, 'getCreate'])->middleware(['auth'])->name('createsummary');
Route::get('/createcohort', function() { return view('create-cohort'); })->middleware(['auth'])->name('createcohort');


require __DIR__.'/auth.php';
