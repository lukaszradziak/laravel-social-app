<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebSocketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/friends', [DashboardController::class, 'friends'])->name('friends');
        Route::get('/chat', [DashboardController::class, 'chat'])->name('chat');
        Route::get('/notifications', [DashboardController::class, 'notifications'])->name('notifications');

        Route::get('/profile/{user}', [DashboardController::class, 'profile'])->name('profile');
        Route::get('/profile/{user}/friends-request', [DashboardController::class, 'friendsRequest'])->name('friends-request');
        
    });
    
});

Route::middleware(['pusher.webhook'])->group(function(){
    Route::post('/websocket-hooks', [WebsocketController::class, 'hooks']);
});