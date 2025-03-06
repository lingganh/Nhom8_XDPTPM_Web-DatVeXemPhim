<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
Route::get('/', function () {
    return view('welcome');
});
//BACKEND
Route::get('admin',  [AuthController::class, 'index'])->name('auth.admin');//->middleware(LoginMiddleware::Class);
Route::post('login',  [AuthController::class, 'login'])->name('auth.login');
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthMiddleware::class);
Route::get('logout', [AuthController:: class, 'logout'])->name('auth.logout');

