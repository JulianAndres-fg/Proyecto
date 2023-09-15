<?php

//Domos
use App\Http\Controllers\DomoController;

//Caracteristicas
use App\Http\Controllers\CaracteristicaController;

//Clientes
use App\Http\Controllers\ClienteController;

//Servicio
use App\Http\Controllers\ServicioController;

//Domo_Caracteristica
// use App\Http\Controllers\DomoCaracteristicaController;

//Plan
// use App\Http\Controllers\PlanController;

//rol
use App\Http\Controllers\RolController;

//Metodo de pago
use App\Http\Controllers\MetodoDePagoController;

//Ofertas
// use App\Http\Controllers\OfertaController;

//recomendaciones
// use App\Http\Controllers\RecomendacionController;


//plan oferta
// use App\Http\Controllers\PlanOfertaController;

//reservas
use App\Http\Controllers\ReservaController;
// use App\Http\Controllers\ServicioPlanController;
use App\Http\Controllers\UsuarioController;
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

Route::group(['middleware' => ['auth']], function () {
    //spatie
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('roles', RolController::class);
    //ruta domos
    Route::resource('domos', DomoController::class);
    //ruta caracteristicas
    Route::resource('caracteristicas', CaracteristicaController::class);
    //ruta reservas
    Route::get('reservas/pdf/{reserva_cod}', [ReservaController::class , 'pdf'])->name('reservas.pdf');
    Route::resource('reservas', ReservaController::class);
    //ruta servicios
    Route::resource('servicios', ServicioController::class);
    //ruta planes
    // Route::resource('planes', PlanController::class);
    //ruta clientes
    Route::resource('clientes', ClienteController::class);
    //ruta servciosplanes
    // Route::resource('serviciosplanes', ServicioPlanController::class);
    //ruta domo_caracteristica
    // Route::resource('domocaracteristicas', DomoCaracteristicaController::class);
    //ruta metodos_de_pagos
    Route::resource('metodosdepago', MetodoDePagoController::class);
    //ruta ofertas
    // Route::resource('ofertas', OfertaController::class);
    //ruta plan oferta
    // Route::resource('planoferta', PlanOfertaController::class);
    //ruta recomendaciones
    // Route::resource('recomendaciones', RecomendacionController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
