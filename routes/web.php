<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;

Route::get('/', function () {
    return view('booking');
});

Route::get('/booking-test', function () {
    return view('booking');
});

Route::prefix('api')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
});
