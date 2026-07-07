<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\DashboardController;

Route::livewire('/personal', 'personal-manager')
    ->name('personal.index');

Route::get('/', function () {
    return view('auth.login');
});

// Login
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index');

// Empleados
Route::get('/empleados', [EmpleadosController::class, 'index'])
    ->name('empleados.index');

// Formulario (provisional)
Route::get('/formulario', [FormularioController::class, 'index'])
    ->name('formulario.index');

Route::post('/formulario', [FormularioController::class, 'submit'])
    ->name('formulario.store');

// Asistencias
Route::get('/asistencias', [AsistenciaController::class, 'index'])
    ->name('asistencias.index');

Route::post('/asistencias/marcar', [AsistenciaController::class, 'marcar'])
    ->name('asistencias.marcar');

Route::get('/asistencias/historial', [AsistenciaController::class, 'historial'])
    ->name('asistencias.historial');

