<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){
        Route::get('/',         [DashboardController::class, 'index'])->name('index');
        Route::get('/friends',  [DashboardController::class, 'friends'])->name('friends');
        Route::get('/chat',     [DashboardController::class, 'chat'])->name('chat');
    });
    
});
