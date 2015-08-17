<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', '\App\Http\Controllers\Welcome@build');

Route::get('reservation/information', '\App\Http\Controllers\Reservation@buildInformationForm');
Route::post('reservation/information', '\App\Http\Controllers\Reservation@postInformationForm');

Route::get('reservation/group', '\App\Http\Controllers\Reservation@buildGroupForm');
Route::get('reservation/individual', '\App\Http\Controllers\Reservation@buildIndividualForm');

Route::get('reservation/confirmation', function() {
    return view('reservation.confirmation');
});

Route::get('management/ReservationManagement.php', '\App\Http\Controllers\ReservationManagement@build');



