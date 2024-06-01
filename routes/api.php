<?php

use App\Http\Controllers\ProgrammationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('professeurs', \App\Http\Controllers\ProfesseurController::class);
Route::resource('matieres', \App\Http\Controllers\MatiereController::class);
Route::resource('classes', \App\Http\Controllers\ClasseController::class);
Route::resource('programmations', ProgrammationController::class);
