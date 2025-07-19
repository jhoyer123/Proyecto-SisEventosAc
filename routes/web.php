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
//Route::get('/admin/Expositores/create', [App\Http\Controllers\ExpositorController::class, 'create'])->name('expositores.create')->middleware('auth');
//Route::post('/admin/Expositores/create', [App\Http\Controllers\ExpositorController::class, 'store'])->name('expositores.store')->middleware('auth');
//Route::get('/admin/Expositores/{id_expositor}', [App\Http\Controllers\ExpositorController::class, 'show'])->name('expositores.show')->middleware('auth');
//Route::get('/admin/Expositores/{id_expositor}/edit', [App\Http\Controllers\ExpositorController::class, 'edit'])->name('expositores.edit')->middleware('auth');
//Route::put('/admin/Expositores/{id_expositor}', [App\Http\Controllers\ExpositorController::class, 'update'])->name('expositores.update')->middleware('auth');
//Route::delete('/admin/Expositores/{id_expositor}', [App\Http\Controllers\ExpositorController::class, 'destroy'])->name('expositores.destroy')->middleware('auth');


