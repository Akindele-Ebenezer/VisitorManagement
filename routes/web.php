<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyVisitorEntryController;

Route::get('/', [DailyVisitorEntryController::class, 'index'])->name('/'); 
Route::post('/Login', [AuthController::class, 'login']); 
Route::get('/Logout', [AuthController::class, 'logout']); 

Route::get('/Dashboard', [DailyVisitorEntryController::class, 'dashboard'])->name('Dashboard');

Route::get('/Entry/Create', [DailyVisitorEntryController::class, 'store']);
Route::get('/Entry/Update/{id}', [DailyVisitorEntryController::class, 'update']);
Route::get('/Entry/Delete/{id}', [DailyVisitorEntryController::class, 'destroy']);