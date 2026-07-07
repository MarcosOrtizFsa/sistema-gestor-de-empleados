<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/formulario', [FormularioController::class, 'index'])->name('formulario.create');

Route::post('/formulario', [FormularioController::class, 'submit']);
Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados.index');

Route::get('/asistencia', [AsistenciaController::class, 'index'])
    ->name('asistencia.index');

Route::post('/asistencia/marcar', [AsistenciaController::class, 'marcar'])
    ->name('asistencia.marcar');

Route::get('/asistencias/historial', [AsistenciaController::class, 'historial'])
    ->name('asistencia.historial');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index');
    
