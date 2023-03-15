<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LaptopApiController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\CategoryController;

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
//API LAPTOP
Route::apiResource('laptops', 'App\Http\Controllers\Api\LaptopApiController');
Route::get('/detail/{id}', [LaptopApiController::class,'detail']);
Route::get('/edit/{id}', [LaptopApiController::class,'show']);
Route::post('/store/laptop', [LaptopApiController::class,'store']);
Route::delete('/delete/laptop/{id}', [LaptopApiController::class,'destroy']);
Route::put('update/laptop/{id}',[LaptopApiController::class,'update']);

//API LOGIN
Route::post('users/login', [LoginController::class, 'Login'])->name('user.login');

//API CHECKOUT
Route::post('/checkout', [CheckoutController::class,'store']);

//API CATEGORY
Route::get('/cate', [CategoryController::class,'index']);
Route::get('/edit/cate/{id}', [CategoryController::class,'show']);
Route::post('/store/cate', [CategoryController::class,'store']);
Route::delete('/delete/cate/{id}', [CategoryController::class,'destroy']);
Route::put('/update/cate/{id}',[CategoryController::class,'update']);



