<?php

use App\Http\Controllers\GrupoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersgrupoControler;

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


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::controller(GrupoController::class)->group(function () {
    Route::get('grupos', 'index')->name('grupos.index');
    Route::get('grupos/create', 'create')->name('grupos.create');
    Route::post('grupos', 'store')->name('grupos.store');
    Route::get('grupos/{grupo}', 'show')->name('grupos.show');

    Route::get('grupos/{grupo}/edit', 'edit')->name('grupos.edit');
    Route::put('grupos/{grupo}', 'update')->name('grupos.update');
});

Route::controller(UsersgrupoControler::class)->group(function () {
    Route::get('usersgrupo', 'index')->name('usersgrupo.index');
    Route::get('usersgrupo/misgrupos', 'misgrupos')->name('usersgrupo.misgrupos');
    Route::delete('usersgrupo', 'delete')->name('usersgrupo.delete');
    Route::get('usersgrupo/otrosgrupos', 'otrosgrupos')->name('usersgrupo.otrosgrupos');
    Route::post('usersgrupo', 'store')->name('usersgrupo.store');
    
});




