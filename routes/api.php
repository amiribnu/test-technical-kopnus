<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VacancyController;
use App\Http\Controllers\Api\CandidateController;
use App\Http\Controllers\Api\JobApplicationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',      [AuthController::class, 'me']);

    
    Route::get('/vacancies',          [VacancyController::class, 'index']);
    Route::post('/vacancies',         [VacancyController::class, 'store']);
    Route::get('/vacancies/{vacancy}',    [VacancyController::class, 'show']);
    Route::put('/vacancies/{vacancy}',  [VacancyController::class, 'update']);
    Route::delete('/vacancies/{vacancy}', [VacancyController::class, 'destroy']);

    
    Route::get('/candidate/profile',   [CandidateController::class, 'show']);
    Route::post('/candidate/profile',  [CandidateController::class, 'update']); // POST untuk file upload

    
    Route::get('/vacancies/{vacancy}/applications',  [JobApplicationController::class, 'index']); // employer
    Route::post('/vacancies/{vacancy}/apply',        [JobApplicationController::class, 'store']); // candidate
    Route::put('/applications/{application}', [JobApplicationController::class, 'update']); // employer update status
});