<?php

//Domos
use App\Http\Controllers\DomoController;

//Caracteristicas
use App\Http\Controllers\CaracteristicaController;

//Servicio
use App\Http\Controllers\ServicioController;

//Domo_Caracteristica
use App\Http\Controllers\DomoCaracteristicaController;
//rol
use App\Http\Controllers\RolController;

//permiso
use App\Http\Controllers\PermisoController;

//Permiso_Rol
use App\Http\Controllers\PermisoRolController;

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

//ruta domo_caracteristica
Route::resource('domocaracteristicas',DomoCaracteristicaController::class);

//ruta roles
Route::resource('roles',RolController::class);

//ruta permisos
Route::resource('permisos',PermisoController::class);

//ruta permiso_roles
Route::resource('permisoroles',PermisoRolController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

