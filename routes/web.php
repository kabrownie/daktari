<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ClientController;

Route::get('/programs', [ProgramController::class, 'index']);
Route::post('/programs', [ProgramController::class, 'store']);

Route::get('/clients', [ClientController::class, 'index']);
Route::post('/clients', [ClientController::class, 'store']);
Route::post('/clients/enroll', [ClientController::class, 'enroll']);
Route::get('/clients/search', [ClientController::class, 'search']);
Route::get('/clients/{id}', [ClientController::class, 'show']);

// API Route
Route::get('/api/clients/{id}', [ClientController::class, 'profile']);
