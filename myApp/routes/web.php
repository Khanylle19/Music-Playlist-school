<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Users CRUD
    Route::resource('users', UserController::class)
        ->except(['show']);

    // Playlists CRUD
    Route::resource('playlists', PlaylistController::class)
        ->except(['show']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});



require __DIR__ . '/auth.php';
