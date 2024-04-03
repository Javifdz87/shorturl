<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParenthesisController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shorten', function () {
    return view('shorten');
});

Route::get('/validar', [ParenthesisController::class, 'mostrarFormulario'])->name('validar.formulario');
Route::post('/validar', [ParenthesisController::class, 'validar'])->name('validar');

