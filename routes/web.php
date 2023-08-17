<?php

//Domos
use App\Http\Controllers\DomoController;

//Caracteristicas
use App\Http\Controllers\CaracteristicaController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

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
//ruta domos
Route::resource('domos',DomoController::class);

//ruta caracteristicas
Route::resource('caracteristicas',CaracteristicaController::class);

//ruta servicios
Route::resource('servicios',ServicioController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

