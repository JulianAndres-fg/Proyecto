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
use App\Http\Controllers\DomoCaracteristicaController;

//Plan
use App\Http\Controllers\PlanController;

//rol
use App\Http\Controllers\RolController;

//permiso
use App\Http\Controllers\PermisoController;

//Permiso_Rol
use App\Http\Controllers\PermisoRolController;

//Metodo de pago
use App\Http\Controllers\MetodoDePagoController;

//reservas
use App\Models\reserva;

//Ofertas
use App\Http\Controllers\OfertaController;

//recomendaciones
use App\Http\Controllers\RecomendacionController;


//plan oferta
use App\Http\Controllers\PlanOfertaController;

//reservas
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioPlanController;
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

//ruta reservas
Route::resource('reservas',ReservaController::class);

//ruta servicios
Route::resource('servicios',ServicioController::class);

//ruta planes
Route::resource('planes',PlanController::class);

//ruta clientes
Route::resource('clientes',ClienteController::class);


Route::resource('serviciosplanes',ServicioPlanController::class);

//ruta domo_caracteristica
Route::resource('domocaracteristicas',DomoCaracteristicaController::class);

//ruta roles
Route::resource('roles',RolController::class);

//ruta permisos
Route::resource('permisos',PermisoController::class);

//ruta permiso_roles
Route::resource('permisoroles',PermisoRolController::class);

//ruta metodos_de_pagos
Route::resource('metodosdepago',MetodoDePagoController::class);

//ruta ofertas
Route::resource('ofertas',OfertaController::class);

//ruta plan oferta
Route::resource('planoferta',PlanOfertaController::class);

//ruta recomendaciones
Route::resource('recomendaciones',RecomendacionController::class);







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

