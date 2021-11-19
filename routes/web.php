<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/reporte', function () {
    return view('diseño-reporte');
});
Route::get('/calendar', function () {
    return view('layouts.plantilla');
});
Route::get('/icono', function () {
    return view('components.iconos');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/inventario', function () {
    return view('Inventario/show-inventario');
})->name('show-inventario');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
