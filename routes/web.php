<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/booking-test', function () {
    return view('booking');
});

// Booking API routes
Route::get('/api/bookings', [BookingController::class, 'index']);
Route::post('/api/bookings', [BookingController::class, 'store']);
