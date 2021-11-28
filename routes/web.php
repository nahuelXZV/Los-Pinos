<?php

<<<<<<< HEAD
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PersonalController;
=======
use App\Http\Controllers\inicioController;
>>>>>>> ca0320f4b7881b2b8f4f47e1b572c22b040e1bc1
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seguridadController;

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

Route::get('/', [inicioController::class, 'dashboard'])->name('inicio')->middleware('auth');

Route::get('/reporte', function () {
    return view('diseño-reporte');
});

<<<<<<< HEAD
Route::get('/calendar', function () {
    return view('layouts.plantilla');
});
Route::get('/icono', function () {
    return view('components.iconos');
});


/* MODULO EQUIPOS */
/*Route::middleware(['auth:sanctum', 'verified'])->get('/equipos', function () {
    return view('equipo.equipos');
})->name('equipos');*/
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos');
Route::get('/almacenes', [EquipoController::class, 'almacens'])->name('almacenes');
Route::get('/salida-equipos', [EquipoController::class, 'salidas'])->name('salidas');
Route::get('/salida-equipos/show/{id}', [EquipoController::class, 'salidas'])->name('salidas.show');
Route::get('/regreso-equipos', [EquipoController::class, 'regresos'])->name('regresos');
Route::get('/regreso-equipos/show{id}', [EquipoController::class, 'regresos'])->name('regresos.show');


/* MODULO PERSONAL */
Route::get('/personal', [PersonalController::class, 'index'])->name('personal');
Route::get('/ingresos-personal', [PersonalController::class, 'ingreso'])->name('personal.ingreso');
Route::get('/salidas-personal', [PersonalController::class, 'salida'])->name('personal.salida');
Route::get('/permisos', [PersonalController::class, 'permiso'])->name('personal.permiso');
Route::get('/reportes', [PersonalController::class, 'repoorte'])->name('personal.reporte');
Route::get('/trabajos', [PersonalController::class, 'trabajo'])->name('personal.trabajo');
Route::get('/trabajos-realizados', [PersonalController::class, 'trabajo_realizado'])->name('personal.trabajo-realizado');
Route::get('/reportes-diarios', [PersonalController::class, 'repoorte_diario'])->name('personal.reporte-diario');
Route::get('/usuarios', [PersonalController::class, 'usuario'])->name('personal.usuario');
Route::get('/roles', [PersonalController::class, 'rol'])->name('personal.rol');
Route::get('/privilegios', [PersonalController::class, 'privilegio'])->name('personal.bitácora');



=======
Route::middleware(['auth:sanctum', 'verified'])->get('/inventario', function () {
    return view('Inventario/show-inventario');
})->name('show-inventario')->middleware('auth');
>>>>>>> ca0320f4b7881b2b8f4f47e1b572c22b040e1bc1

/*MODULO AREAS COMUNES */
Route::get('/reserva', [ReservaController::class, 'index'])->name('reserva')->middleware('auth');
Route::get('/reserva/all', [ReservaController::class, 'reservas'])->name('reserva.all')->middleware('auth');
Route::get('/reserva/list', [ReservaController::class, 'list'])->name('reserva.list')->middleware('auth');
Route::get('/reserva/show/{id}', [ReservaController::class, 'show'])->name('reserva.show')->middleware('auth');
Route::get('/areacomun', [ReservaController::class, 'areas'])->name('areacomun')->middleware('auth');

/*MODULO DE SEGURIDAD */
Route::get('/residentes', [seguridadController::class, 'residentes'])->name('residentes')->middleware('auth');
Route::get('/visitantes', [seguridadController::class, 'visitantes'])->name('visitantes')->middleware('auth');
Route::get('/motorizados', [seguridadController::class, 'motorizados'])->name('motorizados')->middleware('auth');
Route::get('/viviendas', [seguridadController::class, 'viviendas'])->name('viviendas')->middleware('auth');
Route::get('/ingreso', [seguridadController::class, 'ingresos'])->name('ingresos')->middleware('auth');
Route::get('/ingreso/show/{id}', [seguridadController::class, 'showIngreso'])->name('ingresos.show')->middleware('auth');
Route::get('/salida', [seguridadController::class, 'salidas'])->name('salidas')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
