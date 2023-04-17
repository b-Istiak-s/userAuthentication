<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ChildController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace'=>'App\Http\Controllers'],function(){
    Route::apiResource('admins',AdminController::class);
    Route::apiResource('guardians',GuardianController::class);
    Route::apiResource('children',ChildController::class);
});

Route::post('child-login', [ChildController::class, 'login']);