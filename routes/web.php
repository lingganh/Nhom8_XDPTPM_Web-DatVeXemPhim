<?php

use Illuminate\Support\Facades\Route;
use App\{Http\Controllers\Backend\AuthController,
    Http\Controllers\Backend\DashboardController,
    Http\Controllers\Backend\UserController,
    Http\Middleware\AuthMiddleware,
    Http\Middleware\LoginMiddleware,
    Http\Controllers\Backend};

Route::get('/', function () {
    return view('welcome');
});
//BACKEND
Route::get('admin',  [AuthController::class, 'index'])->name('auth.admin');//->middleware(LoginMiddleware::Class);
Route::post('login',  [AuthController::class, 'login'])->name('auth.login');
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthMiddleware::class);
Route::get('logout', [AuthController:: class, 'logout'])->name('auth.logout');
//Route::get('logout', [AuthController:: class, 'logout'])->name('auth.logout');

// USER
Route::get('user/index', [UserController ::class, 'index'])->name('user.index')->middleware(AuthMiddleware::class);


