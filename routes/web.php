<?php

//All Controller Path...
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;




// All routes list here....
Auth::routes();
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('Post', [WelcomeController::class, 'userData'])->name('Post');


Route::get('/dashboard', [HomeController::class, 'index'])->name('home');



