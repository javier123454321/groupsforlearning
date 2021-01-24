<?php

use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/{cohort}/week/{week}', function ($cohort, $week) {
    return view('weeklysummary', ['cohort' => $cohort, 'week' => $week]);
})->middleware(['auth'])->name('weeklysummary');

Route::get('/weeklysummary', [WeeklysummaryController::class, 'getLatest'])->middleware(['auth'])->name('latestsummary');

require __DIR__.'/auth.php';
