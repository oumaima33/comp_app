<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ParticipantController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:Owner', 'prefix' => 'Owner', 'as' => 'Owner.'], function() {
        Route::resource('participants',\App\Http\Controllers\ParticipantController::class);
        Route::get('/competitions/{id}/join', [CompetitionController::class, 'join'])->name('competitions.join');
    });
   Route::group(['middleware' => 'role:participant', 'prefix' => 'participant', 'as' => 'participant.'], function() {
    
    Route::get('/competitions/{code}/join', [CompetitionController::class, 'join'])->name('competitions.join');
   });

});
Route::resource('competitions',\App\Http\Controllers\CompetitionController::class);
Route::resource('Judge',\App\Http\Controllers\JudgeController::class);
Route::get('/competitions/{id}/join', [CompetitionController::class, 'join'])->name('competitions.join');
Route::resource('participants',\App\Http\Controllers\ParticipantController::class);
Route::post('/participants/{id}', [ParticipantController::class, 'store'])->name('participants.store');
