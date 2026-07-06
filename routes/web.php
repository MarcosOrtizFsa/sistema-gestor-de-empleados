<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AsistenciaController;

Route::get('/', function () {
    return view('home');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/formulario', function () {
    return view('formulario');
});

Route::post('/formulario', [FormularioController::class, 'submit']);
Route::get('/empleados', [EmpleadosController::class, 'index']);

Route::get('/asistencia', [AsistenciaController::class, 'index'])
    ->name('asistencia.index');

Route::post('/asistencia/marcar', [AsistenciaController::class, 'marcar'])
    ->name('asistencia.marcar');


