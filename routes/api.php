<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\URLController;
use App\Http\Middleware\ValidateBearerToken;



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


//Route::prefix('v1')->group(function () {
   // Route::post('/shorten', [URLController::class, 'shorten'])->name('shorten');
//});

Route::prefix('v1')->group(function () {
   Route::middleware(ValidateBearerToken::class)->post('/shorten', [URLController::class, 'shorten'])->name('shorten');
});


