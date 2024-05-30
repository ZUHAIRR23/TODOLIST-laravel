<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/todo' , \App\Http\Controllers\TodolistController::class);

// Route::artisan call
Route::get('/artisan-call', function () {
    Artisan::call('storage:link'); // storage:link
    Artisan::call('route:clear'); // route:clear
    Artisan::call('config:clear'); // config:clear
    return 'success';
});