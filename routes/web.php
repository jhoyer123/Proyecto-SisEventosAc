<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Route::view('/','landing.index')->name('index') ;
//Route::view('/about','landing.about')->name('about') ;

Route::get('/', function () {
    return view('home');
})->middleware('auth');


/*
// routes/web.php
Route::group(['middleware' => ['auth']], function () {
    Route::get('/usuarios', [UserController::class, 'index'])
        ->name('usuarios.index');
});*/

/*Route::get('/', function (){
    return view('welcome');
});

Route::get('/test', function (){
    return view('test');
});
    
Route::get('/principal', function (){
    return view('principal');
});*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//Rutas para las consultas sql
Route::get('/admin/sql-console', [App\Http\Controllers\Admin\SQLConsoleController::class, 'index'])
    ->name('admin.sql_console');

Route::post('/admin/sql-console', [App\Http\Controllers\Admin\SQLConsoleController::class, 'execute'])
    ->name('admin.sql_console.execute');

    //Rutas de las inscripciones
//Route::post('/admin/inscripciones', [App\Http\Controllers\PagoController::class, 'store'])->name('inscripciones.store')->middleware('auth');
//Route::post('/admin/inscripciones/create', [App\Http\Controllers\PagoController::class, 'create'])->name('inscripciones.create')->middleware('auth');
Route::post('/admin/inscripciones/create', [App\Http\Controllers\InscripcionController::class, 'store'])->name('inscripciones.store')->middleware('auth');

//Ruats de Pagos
Route::get('/admin/Pagos', [App\Http\Controllers\PagoController::class, 'store'])->name('pagos.store')->middleware('auth');
Route::get('/admin/Pagos/create/{id_evento}', [App\Http\Controllers\PagoController::class, 'create'])->name('pagos.create')->middleware('auth');

// rutas para los expositores
Route::get('/admin/Expositores', [App\Http\Controllers\ExpositorController::class, 'index'])->name('expositores.index')->middleware('auth');
Route::get('/admin/Expositores/create', [App\Http\Controllers\ExpositorController::class, 'create'])->name('expositores.create')->middleware('auth');
Route::post('/admin/Expositores/create', [App\Http\Controllers\ExpositorController::class, 'store'])->name('expositores.store')->middleware('auth');
Route::get('/admin/Expositores/{id_expositor}', [App\Http\Controllers\ExpositorController::class, 'show'])->name('expositores.show')->middleware('auth');
Route::get('/admin/Expositores/{id_expositor}/edit', [App\Http\Controllers\ExpositorController::class, 'edit'])->name('expositores.edit')->middleware('auth');
Route::put('/admin/Expositores/{id_expositor}', [App\Http\Controllers\ExpositorController::class, 'update'])->name('expositores.update')->middleware('auth');
Route::delete('/admin/Expositores/{id_expositor}', [App\Http\Controllers\ExpositorController::class, 'destroy'])->name('expositores.destroy')->middleware('auth');


//Rutas para los Eventos
Route::get('/admin/Eventos', [App\Http\Controllers\EventoController::class, 'index'])->name('eventos.index')->middleware('auth');
Route::get('/admin/Eventos/Act/{id_evento}', [App\Http\Controllers\EventoController::class, 'showAct'])->name('eventos.showAct')->middleware('auth');
Route::get('/admin/Eventos/create', [App\Http\Controllers\EventoController::class, 'create'])->name('eventos.create')->middleware('auth');
Route::post('/admin/Eventos/create', [App\Http\Controllers\EventoController::class, 'store'])->name('eventos.store')->middleware('auth');
Route::get('/admin/Eventos/{id_evento}', [App\Http\Controllers\EventoController::class, 'show'])->name('eventos.show')->middleware('auth');
Route::get('/admin/Eventos/{id_evento}/edit', [App\Http\Controllers\EventoController::class, 'edit'])->name('eventos.edit')->middleware('auth');
Route::put('/admin/Eventos/{id_evento}', [App\Http\Controllers\EventoController::class, 'update'])->name('eventos.update')->middleware('auth');
Route::delete('/admin/Eventos/{id_evento}', [App\Http\Controllers\EventoController::class, 'destroy'])->name('eventos.destroy')->middleware('auth');

//Rutas para los Actividades
Route::get('/admin/Actividades', [App\Http\Controllers\ActividadController::class, 'index'])->name('actividades.index')->middleware('auth');
//Route::get('/admin/Actividades/create/{id_evento}', [App\Http\Controllers\ActividadController::class, 'create'])->name('actividades.create')->middleware('auth');
Route::get('/admin/Actividades/create/{id_evento}', [App\Http\Controllers\ActividadController::class, 'create'])->name('actividades.create')->middleware('auth');
Route::post('/admin/Actividades/create', [App\Http\Controllers\ActividadController::class, 'store'])->name('actividades.store')->middleware('auth');
//Route::get('/admin/Eventos/{id_evento}', [App\Http\Controllers\EventoController::class, 'show'])->name('eventos.show')->middleware('auth');
Route::get('/admin/Actividades/{id_actividad}/edit', [App\Http\Controllers\ActividadController::class, 'edit'])->name('actividades.edit')->middleware('auth');
Route::put('/admin/Actividades/{id_actividad}', [App\Http\Controllers\ActividadController::class, 'update'])->name('actividades.update')->middleware('auth');
Route::delete('/admin/Actividades/{id_actividad}', [App\Http\Controllers\ActividadController::class, 'destroy'])->name('actividades.destroy')->middleware('auth');


//Rutas para los usuarios administradores
Route::get('/admin/Users/administradores', [App\Http\Controllers\Admin\UserController::class, 'listarAdministradores'])->name('users.admin')->middleware('auth');
Route::get('/admin/Users/controles', [App\Http\Controllers\Admin\UserController::class, 'listarControles'])->name('users.control')->middleware('auth');
Route::get('/admin/Users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/admin/Users/create', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/admin/Users/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show')->middleware('auth');
//Route::get('/admin/Expositores/{id_evento}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('eventos.edit')->middleware('auth');
//Route::put('/admin/Expositores/{id_expositor}', [App\Http\Controllers\ExpositorController::class, 'update'])->name('expositores.update')->middleware('auth');
//Route::delete('/admin/Expositores/{id_expositor}', [App\Http\Controllers\ExpositorController::class, 'destroy'])->name('expositores.destroy')->middleware('auth');


