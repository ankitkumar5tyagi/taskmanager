<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TaskController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('task',TaskController::class)->middleware(['verified']);
    Route::resource('service',ServiceController::class);
    
});

Route::get('/', [TaskController::class, 'home'])->name('home');
Route::get('/register', function () {
    return view('user.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/email/verify', [AuthController::class, 'noticeEmail'])->middleware('auth')->name('verification.notice');
 
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [AuthController::class, 'resendEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');