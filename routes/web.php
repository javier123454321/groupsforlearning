<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\WeeklysummaryController;
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

Route::get('/{cohort}/week/{week}', [WeeklysummaryController::class, 'showByWeek'])->middleware(['auth'])->name('weeklysummary');
Route::post('/{cohort}/week/{week}', [CommentsController::class, 'comment']);
Route::get('/weeklysummary', [WeeklysummaryController::class, 'getLatest'])->middleware(['auth'])->name('latestsummary');
Route::get('/createsummary', [WeeklysummaryController::class, 'getCreate'])->middleware(['auth'])->name('createsummary');


require __DIR__.'/auth.php';
