<?php

use App\Http\Controllers\GrupoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/', HomeController::class)->name('home');

Route::controller(GrupoController::class)->group(function(){
    Route::get('grupos', 'index')->name('grupos.index');
    Route::get('grupos/create', 'create')->name('grupos.create');
    Route::post('grupos', 'store')->name('grupos.store');
    Route::get('grupos/{grupo}', 'show')->name('grupos.show');
    
    Route::get('grupos/{grupo}/edit', 'edit')->name('grupos.edit');
    Route::put('grupos/{grupo}', 'update')->name('grupos.update');
});



