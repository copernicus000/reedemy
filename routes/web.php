<?php

use App\Modules\Reedemy\Controllers\MainController;
use App\Modules\Reedemy\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class,'index']);
Route::get('/register', [RegisterUserController::class,'create']);
Route::post('/register', [RegisterUserController::class,'store']);
