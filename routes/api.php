<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

//get vaccination(s)
Route::get('vaccinations', [VaccinationController::class, 'index']);
Route::get('vaccination/{id}', [VaccinationController::class, 'findById']);


//get location(s)
Route::get('locations', [LocationController::class, 'index']);
Route::get('location/{id}', [LocationController::class, 'findById']);


//login
Route::post('auth/login', [AuthController::class, 'login']);

//get user(s)
Route::get('users', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'findById']);


Route::group(['middleware'=>['api', 'auth.jwt']], function(){
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::post('vaccination/save', [VaccinationController::class, 'save']);
    Route::put('vaccination/{id}', [VaccinationController::class, 'update']);
    Route::delete('vaccination/{id}', [VaccinationController::class, 'delete']);
    Route::post('user/save', [UserController::class, 'save']);
    Route::delete('user/{id}', [UserController::class, 'delete']);
    Route::put('user/{id}', [UserController::class, 'update']);
    Route::post('location/save', [LocationController::class, 'save']);
    Route::put('location/{id}', [LocationController::class, 'update']);
    Route::delete('location/{id}', [LocationController::class, 'delete']);
});
