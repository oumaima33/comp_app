<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\EvaluationController;
use Illuminate\Http\Request;


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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('homepage');
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
Route::get('/search', [CompetitionController::class, 'search'])->name('competitions.search');

