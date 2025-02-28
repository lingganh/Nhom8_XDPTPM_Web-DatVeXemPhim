<?php

use App\Http\Controllers\Backend\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
Route::get('/', function () {
    return view('welcome');
});

Route::get('login',  [AuthController::class, 'login'])->name('login');

