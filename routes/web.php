<?php

use App\Modules\Reedemy\Controllers\SessionUserController;
use App\Modules\Reedemy\Controllers\MainController;
use App\Modules\Reedemy\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;
use App\Modules\Reedemy\Controllers\TokenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//user register
Route::get('/', [MainController::class,'index']);
Route::get('/register', [RegisterUserController::class,'create']);
Route::post('/register', [RegisterUserController::class,'store']);

//user session
Route::get('/sessions', [SessionUserController::class,'create']);
Route::post('/sessions',[SessionUserController::class,'store']);
Route::post('/logout',[SessionUserController::class,'destroy']);

//resource controller
Route::get('/redeemer/create',[MainController::class,'create']);
Route::post('/redeemers', [MainController::class,'store']);
Route::get('/redeemers/{id}/edit', [MainController::class,'edit'])->name('vinyl.edit');
Route::get('/redeemers/{id}', [MainController::class,'show']);
Route::delete('/redeemers/{id}', [MainController::class,'destroy'])->name('vinyl.delete');


//token and download file if verified
Route::post('/redeemers/{id}/verify', [TokenController::class,'verify'])->name('vinyl.verify');
Route::post('/redeemers/{id}/confirm', [TokenController::class,'confirmPurchase'])->name('vinyl.confirm');


