<?php

use App\Http\Controllers\UserController;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'mobile.redirect'], function () {
    Route::get('rooms/rooms_available', [RoomController::class, 'roomAvailable']);
});

Route::resource('rooms', RoomController::class);
Route::get('users/send_email', [UserController::class, 'sendEmail']);
Route::resource('bookings', BookingController::class);
