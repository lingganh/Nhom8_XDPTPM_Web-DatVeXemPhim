<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
Route::get('/', function () {
    return view('welcome');
});
//BACKEND
Route::get('admin',  [AuthController::class, 'index'])->name('auth.admin');
Route::post('do-login',  [AuthController::class, 'login'])->name('auth.login');
Route::get('Dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

