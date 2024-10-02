<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\FamilycashflowController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Route login
Route::get('/', [UsersController::class, "index"])->middleware('guest');
Route::post('/Login', [UsersController::class, "login"]);
Route::post('/logout', [UsersController::class, "logout"])->middleware('auth');

// Route untuk export
Route::get('/export', [CrudController::class, 'export'])->middleware('auth');

// Rute khusus admin
Route::middleware(['auth', 'isUser'])->group(function () {
    // Rute yang hanya bisa diakses oleh admin
    Route::resource('/admin', adminController::class);
});

// Rute khusus user
Route::middleware(['auth'])->group(function () {
    // Rute yang hanya bisa diakses oleh user
    Route::resource('/home', CrudController::class);
});
