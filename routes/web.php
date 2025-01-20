<?php

use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/booking', [BookingController::class, 'index'])->middleware(['auth', 'verified'])->name('booking');

Route::post('/booking/{room}', [BookingController::class, 'store'])->middleware(['auth', 'verified'])->name('booking.store');

Route::get('/my-bookings', [BookingController::class, 'myBookings'])
    ->name('bookings.my')
    ->middleware(['auth', 'verified']);

Route::post('/bookings/{transaction}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');

Route::middleware(['auth'])->group(function () {
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
