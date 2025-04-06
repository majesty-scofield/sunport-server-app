<?php

/*
|--------------------------------------------------------------------------
| SPA Auth Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with '/'.
| These routes use the root namespace 'App\Http\Controllers\Web'.
|
 */

use App\Base\Constants\Auth\Role;
use Illuminate\Support\Facades\Auth;

/*
 * These routes are used for web authentication.
 *
 * Route prefix 'api/spa'.
 * Root namespace 'App\Http\Controllers\Web\Admin'.
 */

/**
 * Temporary dummy route for testing SPA.
 */

 Route::middleware('auth:web')->group(function () {
    Route::namespace('Web_Booking')->group(function () {
        // Adhoc Web Booking
        Route::post('adhoc-eta', 'AdhocWebBookingController@eta');
        Route::post('adhoc-create-request', 'AdhocWebBookingController@createRequest');
        Route::post('adhoc-list-packages', 'AdhocWebBookingController@listPackages');
        Route::post('adhoc-cancel-booking', 'AdhocWebBookingController@cancelRide');
    });
});

    Route::namespace('Web_Booking')->group(function () {
        Route::get('web-booking','AdhocWebBookingController@web_booking');
        Route::post('Adduser','AdhocWebBookingController@Saveuser');
        Route::post('Adduserdemo','AdhocWebBookingController@Saveuserdemo');
        Route::get('web-booking-history','AdhocWebBookingController@web_booking_history');
        Route::get('web-booking-history-details/{id}','AdhocWebBookingController@web_booking_history_detail');
        Route::match(['get', 'post'], 'web-booking-ride-cancel/{id}','AdhocWebBookingController@delete');
        Route::get('track/request/{request}', 'AdminViewController@trackTripDetails');

        Route::match(['get', 'post'], 'logout', function () {
           auth('web')->logout();
            request()->session()->invalidate();
            return redirect('web-booking');
        })->name('logout');
    });



