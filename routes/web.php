<?php

use HomeController\HomeController;
use Illuminate\Support\Facades\Route;
use App\{Http\Controllers\Backend\AuthController,
    Http\Controllers\Backend\CommentsController,
    Http\Controllers\Backend\DashboardController,
    Http\Controllers\Backend\FilmController,
    Http\Controllers\Backend\UserGroupController,
    Http\Controllers\Controller,
    Http\Controllers\Frontend\SignInController,
    Http\Middleware\AuthMiddleware,
    Http\Middleware\LoginMiddleware,
    Http\Controllers\Backend};
use App\Http\Controllers\Frontend\ListFilmController;

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
Route::get('user/index', [Backend\UserController ::class, 'index'])->name('user.index')->middleware(AuthMiddleware::class);
Route::get('usergroup/index', [UserGroupController ::class, 'index'])->name('usergroup.index')->middleware(AuthMiddleware::class);
// Film
Route::get('films/index', [FilmController::class, 'index'])->name('films.index ')->middleware(AuthMiddleware::class);

 //movie showtimes
Route::get('movieShowtime/index', [ Backend\movieShowtimeController::class, 'index'])->name('movieShowtime.index ')->middleware(AuthMiddleware::class);


// Comments
Route::get('comments/index', [CommentsController::class, 'index'])->name('comments.index ')->middleware(AuthMiddleware::class);


// revenue
Route::get('revenue/index', [Backend\RevenueController::class, 'index'])->name('revenue.index ')->middleware(AuthMiddleware::class);

//ticket
Route::get('ticket/index', [Backend\ticketController::class, 'index'])->name('ticket.index ')->middleware(AuthMiddleware::class);


// FE _home
Route::get('', [Controller::class, 'index']);

//List Film
Route::get('film/index', [ListFilmController::class, 'index'])->name('film.index');


//Sign In

Route::get('signin/index', [SignInController::class, 'index'])->name('signin.index');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
