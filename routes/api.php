<?php

use App\Http\Controllers\UserController;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomsController;
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

Route::group(['prefix' => 'booking'], function () {
    Route::get('/', [BookingController::class, 'index']);
    Route::get('/{id}', [BookingController::class, 'show']);
    Route::post('/', [BookingController::class, 'store']);
    Route::put('/{id}', [BookingController::class, 'update']);
    Route::delete('/{id}', [BookingController::class, 'destroy']);
});

Route::group(['prefix' => 'rooms'], function () {
    Route::get('/', [RoomsController::class, 'index']);
        Route::get('/roomAvailable', [RoomsController::class, 'roomAvailable']);
    Route::get('/{id}', [RoomsController::class, 'show']);
    Route::post('/', [RoomsController::class, 'store']);
    Route::put('/{id}', [RoomsController::class, 'update']);
    Route::delete('/{id}', [RoomsController::class, 'destroy']);

});
Route::group(['prefix' => 'user'], function () {

    Route::post('/sendEmail', [UserController::class, 'send']);


});
