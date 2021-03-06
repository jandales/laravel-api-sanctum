<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users/store',[UserController::class, 'store']);
// Route::get('/users/show/{user:id}', [UserController::class, 'show']);
// Route::put('/users/update/{user:id}',[UserController::class, 'update']);
// Route::delete('/users/destory/{user:id}',[UserController::class, 'destroy']);
// Route::get('/users/search/{name}',[UserController::class, 'search']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);  
Route::post('/register',[AuthController::class, 'register']);


Route::group(['middleware' => ['auth:sanctum']], function () { 

    Route::delete('/logout',[AuthController::class, 'logout']);
    Route::get('/users', [UserController::class, 'index']);  
    Route::get('/users/show/{user:id}', [UserController::class, 'show']);
    Route::put('/users/update/{user:id}',[UserController::class, 'update']);
    Route::delete('/users/destory/{user:id}',[UserController::class, 'destroy']);  


});

Route::get('/users/search/{name}',[UserController::class, 'search']);



