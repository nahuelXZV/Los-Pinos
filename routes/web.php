<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seguridadController;
use App\Http\Controllers\sistemaController;

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

/* MODULO EQUIPOS */
Route::get('/equipos', [inicioController::class, 'equipos'])->name('equipos')->middleware('auth');
Route::get('/almacenes', [inicioController::class, 'almacens'])->name('almacenes')->middleware('auth');
Route::get('/salidaEquipos', [inicioController::class, 'salidas'])->name('salidasEquipo')->middleware('auth');
Route::get('/salidaEquipos/show/{id}', [inicioController::class, 'show_salidas'])->name('salidasEquipos.show')->middleware('auth');
Route::get('/regresoEquipos', [inicioController::class, 'regresos'])->name('regresosEquipo')->middleware('auth');
Route::get('/regresoEquipos/show/{id}', [inicioController::class, 'show_regresos'])->name('regresosEquipos.show')->middleware('auth');

Route::get('/salidaEquipos/pdf/{search}/{sort}/{direction}', [inicioController::class, 'salidaEquiposlista'])->name('salidaEquiposlista.pdf')->middleware('auth');
Route::get('/salidaEquipos/pdf/{id}', [inicioController::class, 'salidaEquipos'])->name('salidaEquipos.pdf')->middleware('auth');
Route::get('/regresoEquipos/pdf/{search}/{sort}/{direction}', [inicioController::class, 'regresoEquiposlista'])->name('regresoEquiposlista.pdf')->middleware('auth');
Route::get('/regresoEquipos/pdf/{id}', [inicioController::class, 'regresoEquipos'])->name('regresoEquipos.pdf')->middleware('auth');



/* MODULO PERSONAL */
Route::get('/personal', [PersonalController::class, 'personal'])->name('personal')->middleware('auth');
Route::get('/personal/show/{id}', [PersonalController::class, 'datos'])->name('personal.show')->middleware('auth');
Route::get('/trabajos', [PersonalController::class, 'trabajos'])->name('trabajos')->middleware('auth');
Route::get('/seccion', [PersonalController::class, 'seccion'])->name('seccion')->middleware('auth');
Route::get('/horario', [PersonalController::class, 'horario'])->name('horario')->middleware('auth');
Route::get('/reporteAsistencia', [PersonalController::class, 'reportes'])->name('reporte.asistencia')->middleware('auth');
Route::get('/reporteAsistencia/show/{id}', [PersonalController::class, 'permisos'])->name('reporteAsistencia.show')->middleware('auth');
Route::get('/reporteTrabajo', [PersonalController::class, 'reportes_trabajo'])->name('reporte.trabajo')->middleware('auth');
Route::get('/reporteTrabajo/{id}', [PersonalController::class, 'trabajo_realizado'])->name('reporteTrabajo.show')->middleware('auth');

Route::get('/reporteTrabajo/pdf/{search}/{sort}/{direction}', [PersonalController::class, 'pdfListaRtrabajo'])->name('reporteTrabajoLista.pdf')->middleware('auth');
Route::get('/reporteTrabajo/pdf/{id}', [PersonalController::class, 'pdfShowRtrabajo'])->name('reporteTrabajo.pdf')->middleware('auth');
Route::get('/reporteAsistencia/pdf/{search}/{sort}/{direction}', [PersonalController::class, 'pdfListaRasistencia'])->name('reporteAsistenciaLista.pdf')->middleware('auth');
Route::get('/reporteAsistencia/pdf/{id}', [PersonalController::class, 'pdfShowRasistencua'])->name('reporteAsistencia.pdf')->middleware('auth');



/*MODULO AREAS COMUNES */
Route::get('/areacomun', [ReservaController::class, 'areas'])->name('areacomun')->middleware('auth');
Route::get('/calendario', [ReservaController::class, 'index'])->name('reserva')->middleware('auth');
Route::get('/reservas', [InventarioController::class, 'reservas'])->name('reserva.all')->middleware('auth');
Route::get('/lista', [ReservaController::class, 'list'])->name('reserva.list')->middleware('auth');
Route::get('/reserva/{id}', [InventarioController::class, 'reservaShow'])->name('reserva.show')->middleware('auth');

Route::get('/pdfReservaLista/pdf/{search}/{sort}/{direction}', [ReservaController::class, 'listaReserva'])->name('listaReserva.pdf')->middleware('auth');
Route::get('/pdfReserva/{id}', [ReservaController::class, 'reservaPdf'])->name('reservaPdf.pdf')->middleware('auth');



/*MODULO DE SEGURIDAD */
Route::get('/residentes', [seguridadController::class, 'residentes'])->name('residentes')->middleware('auth');
Route::get('/visitantes', [seguridadController::class, 'visitantes'])->name('visitantes')->middleware('auth');
Route::get('/motorizados', [seguridadController::class, 'motorizados'])->name('motorizados')->middleware('auth');
Route::get('/viviendas', [seguridadController::class, 'viviendas'])->name('viviendas')->middleware('auth');
Route::get('/ingreso', [seguridadController::class, 'ingresos'])->name('ingresos')->middleware('auth');
Route::get('/ingreso/{id}', [seguridadController::class, 'showIngreso'])->name('ingresos.show')->middleware('auth');
Route::get('/salida', [seguridadController::class, 'salidas'])->name('salidas')->middleware('auth');
Route::get('/salida/{id}', [seguridadController::class, 'showSalida'])->name('salidas.show')->middleware('auth');

Route::get('/pdfsalida/{id}', [seguridadController::class, 'pdfsalida'])->name('salidas.pdf')->middleware('auth');
Route::get('/pdfingreso/{id}', [seguridadController::class, 'pdfingreso'])->name('ingreso.pdf')->middleware('auth');
Route::get('/pdfsalida/pdf/{search}/{sort}/{direction}', [seguridadController::class, 'pdfsalidalista'])->name('salidaslista.pdf')->middleware('auth');
Route::get('/pdfingreso/pdf/{search}/{sort}/{direction}', [seguridadController::class, 'pdfingresolista'])->name('ingresolista.pdf')->middleware('auth');



/*MODULO SISTEMA */
Route::get('/usuarios', [sistemaController::class, 'usuarios'])->name('usuarios')->middleware('auth');
Route::get('/roles', [sistemaController::class, 'roles'])->name('roles')->middleware('auth');
Route::get('/bitacora', [sistemaController::class, 'bitacora'])->name('bitacora')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
