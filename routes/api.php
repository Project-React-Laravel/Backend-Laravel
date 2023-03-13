<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LaptopApiController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CheckoutController;

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
Route::apiResource('laptops', 'App\Http\Controllers\Api\LaptopApiController');
Route::get('/detail/{id}', [LaptopApiController::class,'detail']);
Route::post('users/login', [LoginController::class, 'Login'])->name('user.login');
Route::post('/checkout', [CheckoutController::class,'store']);



