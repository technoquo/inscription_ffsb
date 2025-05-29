<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [App\Http\Controllers\FormularioController::class, 'index'])->name('formulario.index');
Route::post('/merci', [App\Http\Controllers\FormularioController::class, 'store'])->name('formulario.store');
Route::get('/enregistrements', [App\Http\Controllers\FormularioController::class, 'registro'])->name('formulario.registro');
Route::get('/enregistrements/csv', [App\Http\Controllers\FormularioController::class, 'exportCsv'])->name('formulario.export.csv');

