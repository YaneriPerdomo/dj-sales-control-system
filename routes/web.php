<?php

use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('iniciar-sesion', 'index')->name('login');
    Route::post('iniciar-sesion', 'store')->name('attemptLogin');
});
 
Route::get('panel-control',[ControlPanelController::class, 'index'])
->middleware(['auth'])
->name(name: 'controlPanel');

Route::post('cerrar-sesion', [LoginController::class,'logout'])->name('logout');