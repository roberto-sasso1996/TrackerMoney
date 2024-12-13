<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\TransactionController;

Route::get('/', [PublicController::class , 'welcome'])->name('welcome');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [TrackerController::class , 'home'])->name('home');
    Route::post('/transition/store' , [TransactionController::class , 'store'])->name('transition.store');
    Route::get('/reports', [TrackerController::class, 'index'])->name('index');
});


