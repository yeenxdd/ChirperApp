<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'verified'], function () {
        Route::get('chirps', [ChirpController::class, 'index'])->name('chirps');

        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

    Route::view('profile', 'profile')->name('profile');
});

require __DIR__ . '/auth.php';
