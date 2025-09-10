<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;

Route::get('/', function () {
    return view('booking');
});

Route::get('/booking-test', function () {
    return view('booking');
});
