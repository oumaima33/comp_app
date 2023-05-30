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
Route::resource('participants',\App\Http\Controllers\ParticipantController::class)->only(['index','create','show','destroy','update','edit']);
Route::post('participants/{id}',[ParticipantController::class,'store'])->name('participants.join');

Route::get('/evaluations/{participant}/{competition_id}', [EvaluationController::class,'index'])->name('evaluations.index');
Route::post('/evaluations/{id}', [EvaluationController::class,'store'])->name('evaluations.store');


Route::get('/participations', [ParticipantController::class,'create'])->name('participation.create');
Route::get('/certificate/{participant}/{competition}/{score}', [ParticipantController::class, 'generateCertificate'])->name('certificate.generate');


Route::get('/judges',[JudgeController::class,'index'])->name('judges.index');
Route::post('/judges/{id_comp}',[JudgeController::class,'store'])->name('judges.store');
Route::get('/judges/{id}',[JudgeController::class,'create'])->name('judges.invite');
Route::get('/judges/{judge}/destroy',[JudgeController::class,'destroy'])->name('judges.destroy');

