<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LopApiController;
use App\Http\Controllers\Api\StudentApiController;
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


Route::prefix('api-admin')->group(function(){
    Route::get('sinhvien',[StudentApiController::class,'index']);
    Route::get('update-sinhvien/{id}',[StudentApiController::class,'show']);
    Route::post('add-sinhvien',[StudentApiController::class,'store']);
    Route::delete('delete-sinhvien/{id}',[StudentApiController::class,'destroy']);
});

