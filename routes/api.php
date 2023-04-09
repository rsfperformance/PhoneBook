<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/notification', [\App\Http\Controllers\Api\NotificationController::class, 'sendBirthdayNotifications']);
//Authorization
Route::post('/login',[\App\Http\Controllers\Api\Auth\AuthController::class, 'login']);
Route::post('/register',[\App\Http\Controllers\Api\Auth\AuthController::class, 'register']);
Route::post('/logout',[\App\Http\Controllers\Api\Auth\AuthController::class, 'logout']);

//Contacts
Route::get('/contacts', [\App\Http\Controllers\Api\ContactController::class, 'index']);
Route::post('/contacts', [\App\Http\Controllers\Api\ContactController::class, 'store']);
Route::put('/contacts/{id}', [\App\Http\Controllers\Api\ContactController::class, 'update']);
Route::delete('/contacts/{id}', [\App\Http\Controllers\Api\ContactController::class, 'destroy']);

//Phone
Route::post('/phones', [\App\Http\Controllers\Api\PhoneController::class, 'store']);
Route::put('/phones', [\App\Http\Controllers\Api\PhoneController::class, 'update']);
Route::delete('/phones/{id}', [\App\Http\Controllers\Api\PhoneController::class, 'destroy']);

//Email
Route::post('/emails', [\App\Http\Controllers\Api\EmailController::class, 'store']);
Route::put('/emails', [\App\Http\Controllers\Api\EmailController::class, 'update']);
Route::delete('/emails/{id}', [\App\Http\Controllers\Api\EmailController::class, 'destroy']);

//Search
Route::get('/search', [\App\Http\Controllers\Api\SearchController::class, 'search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
