<?php

use App\{Http\Controllers\Admin,
    Http\Controllers\Admin\AuthController,
    Http\Controllers\Admin\CommentsController,
    Http\Controllers\Admin\DashboardController,
    Http\Controllers\Admin\FilmController,
    Http\Controllers\Admin\UserGroupController,
    Http\Controllers\Controller,
    Http\Controllers\Client\forgotpassword,
    Http\Controllers\Client\SignInController,
    Http\Controllers\Client\BookingController,
    Http\Middleware\SignInMiddleware,
    Livewire\Homepage,
    Livewire\QrCodePayment,
    Livewire\UserProfile};

use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\Client\ListFilmController;
use App\Http\Controllers\Client\moviesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\movieShowtimeController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/moviveShowtime', [movieShowtimeController::class, 'index'])->name('moviveShowtime.index');
    Route::get('/moviveShowtime/create', [movieShowtimeController::class, 'create'])->name('moviveShowtime.create');
    Route::post('/moviveShowtime', [movieShowtimeController::class, 'store'])->name('moviveShowtime.store');
    Route::delete('/moviveShowtime/{idLC}', [movieShowtimeController::class, 'destroy'])->name('moviveShowtime.destroy');
    Route::get('/moviveShowtime/{idLC}/edit', [movieShowtimeController::class, 'edit'])->name('moviveShowtime.edit');
    Route::put('/moviveShowtime/{idLC}', [movieShowtimeController::class, 'update'])->name('moviveShowtime.update');

});

Route::get('/movies', [moviesController::class, 'index'])->name('movies.index');

Route::get('movies', [moviesController::class, 'index'])->name('movies.index');
 Route::get('movies/{M_id}', [moviesController::class, 'detail'])->name('client.movies.show');
Route::get('/', function () {
    return view('welcome');
});
//BACKEND
Route::get('admin',  [AuthController::class, 'index'])->name('auth.admin');//->middleware(LoginMiddleware::Class);
Route::post('login',  [AuthController::class, 'login'])->name('auth.login');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(SignInMiddleware::class);
Route::get('logout', [AuthController:: class, 'logout'])->name('auth.logout');

// USER
Route::get('user', [Admin\UserController ::class, 'index'])->name('user.index')->middleware(SignInMiddleware::class);
Route::get('usergroup', [UserGroupController ::class, 'index'])->name('usergroup.index')->middleware(SignInMiddleware::class);
Route::put('role/{user}', [UserGroupController::class, 'updateRole'])->name('userupdate.role')->middleware(SignInMiddleware::class);



Route::post('user', [Admin\UserController::class, 'create'])->name('user.create')->middleware(SignInMiddleware::class);
Route::put('user/{user}', [Admin\UserController::class, 'update'])->name('user.update')->middleware(SignInMiddleware::class);
Route::delete('user/{user}', [Admin\UserController::class, 'delete'])->name('user.destroy')->middleware(SignInMiddleware::class);
// Film
Route::get('films', [FilmController::class, 'index'])->name('films.index ')->middleware(SignInMiddleware::class);
 Route::post('filmsupdate/{id}', [FilmController::class, 'update'])->middleware(SignInMiddleware::class);
 Route::post('filmscreate', [FilmController::class, 'create'])->name('films.create')->middleware(SignInMiddleware::class);
Route::get('filmsdelete/{id}', [FilmController::class, 'delete'])->name('films.delete')->middleware(SignInMiddleware::class);

//movie showtimes
Route::get('movieShowtime', [Admin\movieShowtimeController::class, 'index'])->name('movieShowtime.index ')->middleware(SignInMiddleware::class);


// Comments
Route::get('comments', [CommentsController::class, 'index'])->name('comments.index ')->middleware(SignInMiddleware::class);


// revenue
Route::get('revenue', [Admin\RevenueController::class, 'index'])->name('revenue.index ')->middleware(SignInMiddleware::class);

//ticket
Route::get('ticket', [Admin\ticketController::class, 'index'])->name('ticket.index ')->middleware(SignInMiddleware::class);
Route::get('admin/tickets', [Admin\ticketController::class, 'index'])->name('admin.tickets.index');

// FE _home
Route::get('', Homepage::class)->name('home.index');


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
Route::get('admin/revenue', [Admin\RevenueController::class, 'index_statistic'])->name('admin.revenue.index')->middleware(SignInMiddleware::class);

// revenue
Route::get('movie-index', [Admin\movieShowtimeController::class, 'movieIndex'])->name('user.movieIndex');
// Register verify OTP
Route::get('/register', [SignInController::class, 'showRegisterForm'])->name('register');
Route::post('/register',  [SignInController::class, 'register']);

Route::get('/verify-otp', [SignInController::class, 'showVerifyForm'])->name('verify-otp');
Route::post('/verify', [SignInController::class, 'verifyOtp'])->name('verify');
Route::post('/resend-otp',  [SignInController::class, 'resendOtp'])->name('resend-otp');

Route::get('logoutuser', [SignInController:: class, 'logout'])->name('logout.user');
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
//bookng

Route::middleware([SignInMiddleware::class])->group(function () {
    Route::get('/dat-ve/{phim_id}/chon-lich-chieu', [BookingController::class, 'showShowtimes'])->name('booking.showtimes');
    Route::get('/dat-ve/{lich_chieu_id}/chon-ghe', [BookingController::class, 'showSeats'])->name('booking.seats');
    Route::post('/dat-ve/xac-nhan-ghe', [BookingController::class, 'processSeatSelection'])->name('booking.confirm-seats');
    Route::get('/booking/select-food', [BookingController::class, 'showSelectFood'])->name('booking.select-food');
    Route::post('/booking/checkout', QrCodePayment::class)->name('booking.confirmation');

    Route::get('/vnpay_payment', [QrCodePayment::class, 'vnpay_payment'])->name('booking.payment');
    Route::get('/ketqua', [QrCodePayment::class, 'vnpay_return'])->name('ketqua');
    Route::get('payment/fail', \App\Livewire\PaymentFailure::class )->name( 'payment.failure');
    Route::get('payment/success', \App\Livewire\PaymentSuccess::class )->name('payment.success');
    // user profile
    Route::get('user/profile', UserProfile::class)->name('user.profile');
});


