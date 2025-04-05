<?php

use HomeController\HomeController;
use Illuminate\Support\Facades\Route;
use App\{Http\Controllers\Backend\AuthController,
    Http\Controllers\Backend\CommentsController,
    Http\Controllers\Backend\DashboardController,
    Http\Controllers\Backend\FilmController,
    Http\Controllers\Backend\UserGroupController,
    Http\Controllers\Controller,
    Http\Controllers\Frontend\forgotpassword,
    Http\Controllers\Frontend\SignInController,
    Http\Middleware\AuthMiddleware,
    Http\Middleware\LoginMiddleware,
    Http\Controllers\Backend};
use App\Http\Controllers\Frontend\ListFilmController;
use App\Http\Controllers\Backend\RevenueController;

Route::get('/', function () {
    return view('welcome');
});
//BACKEND
Route::get('admin',  [AuthController::class, 'index'])->name('auth.admin');//->middleware(LoginMiddleware::Class);
Route::post('login',  [AuthController::class, 'login'])->name('auth.login');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthMiddleware::class);
Route::get('logout', [AuthController:: class, 'logout'])->name('auth.logout');


// USER
Route::get('user', [Backend\UserController ::class, 'index'])->name('user.index')->middleware(AuthMiddleware::class);
Route::get('usergroup', [UserGroupController ::class, 'index'])->name('usergroup.index')->middleware(AuthMiddleware::class);
// Film
Route::get('films', [FilmController::class, 'index'])->name('films.index ')->middleware(AuthMiddleware::class);
Route::post('filmsupdate/{id}', [FilmController::class, 'update'])->middleware(AuthMiddleware::class);
 //movie showtimes
Route::get('movieShowtime', [Backend\movieShowtimeController::class, 'index'])->name('movieShowtime.index ')->middleware(AuthMiddleware::class);


// Comments
Route::get('comments', [CommentsController::class, 'index'])->name('comments.index ')->middleware(AuthMiddleware::class);


// revenue
Route::get('revenue', [Backend\RevenueController::class, 'index'])->name('revenue.index ')->middleware(AuthMiddleware::class);

//ticket
Route::get('ticket', [Backend\ticketController::class, 'index'])->name('ticket.index ')->middleware(AuthMiddleware::class);


// FE _home
Route::get('', [Controller::class, 'index'])->name('home.index');

//List Film
Route::get('/film', [ListFilmController::class, 'index'])->name('film.index');


//Sign In

Route::get('/signin', [SignInController::class, 'showLoginForm'])->name('signin.index');
Route::post('/signin',  [SignInController::class, 'signin'])->name('five.signIn');



//Route::get('/api/get-revenue-by-product', [RevenueController::class, 'getRevenueByProduct']);

route::post('/filter-by-date', [RevenueController::class, 'filter_by_date']);
route::post('/dashboard-filter', [RevenueController::class, 'dashboard_filter']);
route::post('/days-order', [RevenueController::class, 'days_order']);


// revenue
Route::get('admin/revenue', [Backend\RevenueController::class, 'index_statistic'])->name('admin.revenue.index')->middleware(AuthMiddleware::class);

// revenue
Route::get('movie-index', [Backend\movieShowtimeController::class, 'movieIndex'])->name('user.movieIndex');
// Register verify OTP
Route::get('/register', [SignInController::class, 'showRegisterForm'])->name('register');
Route::post('/register',  [SignInController::class, 'register']);

Route::get('/verify-otp', [SignInController::class, 'showVerifyForm'])->name('verify-otp');
Route::post('/verify', [SignInController::class, 'verifyOtp'])->name('verify');
Route::post('/resend-otp',  [SignInController::class, 'resendOtp'])->name('resend-otp');

Route::get('/logoutuser', [SignInController:: class, 'logout'])->name('logout');
//Test
Route::get('/test-email', function () {
    $details = ['message' => 'Email test từ Laravel'];
    \Mail::raw($details['message'], function ($message) {
        $message->to('dieulinh120411@gmail.com')
            ->subject('Test Email');
    });
    return 'Đã gửi email thành công!';
});


// Forgot password
Route::get('/fpass', [forgotpassword::class, 'index'])->name('fpass');
