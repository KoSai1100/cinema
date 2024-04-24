<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CinemaBuildingController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffRegisterController;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('backend.cinemas.create');
// });


// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/',[IndexController::class,'home'])->name('home');

Route::get('/seatplan/{id}',[IndexController::class,'seatplan'])->name('index.seatplan');

Route::post('/check-seat-availability',[IndexController::class,'checkSeatAvailability'])->name('check.seat.availability');

Route::get('/movie-checkout', [IndexController::class, 'showCheckout'])->name('movie.checkout');

Route::post('/booking', [IndexController::class, 'bookSeats'])->name('booked.seats');

Route::get('/contact-us',[IndexController::class,'contact'])->name('contact.us');



Route::middleware(RedirectIfNotAuthenticated::class)->group(function(){
    Route::get('booking_list', [IndexController::class,'bookinglist'])->name('booking.list');
    Route::delete('/booking_cancel/{id}', [IndexController::class,'destroy'])->name('booking.destroy');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout',[RegisterController::class, 'logout'])->name('user.logout');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login',[RegisterController::class,'login'])->name('login');
Route::post('/login',[RegisterController::class,'loginstore']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('backend.index');
})->name('dashboard');


// Route::middleware(['auth', 'verified', 'role:Admin', 'staff'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('backend.index');
//     })->name('dashboard');
// });

// Route::get('/dashbord',[StaffController::class,'create']);

Route::resource('cinema_building',CinemaBuildingController::class);

Route::resource('movie',MovieController::class);

Route::resource('showtimes',ShowTimeController::class);

Route::get('/booking',[BookingController::class,'showlist'])->name('booking.index');

Route::resource('staff',StaffController::class);

Route::get('/admin/login',[StaffRegisterController::class,'login'])->name('admin.login');
Route::post('/admin/login',[StaffRegisterController::class,'loginstore']);
Route::post('/admin/logout', [StaffRegisterController::class, 'adminlogout'])->name('admin.logout');
