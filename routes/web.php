<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\EmpleadosController;

Route::get('/', function () {
    return view('home');
});



Route::get('/formulario', function () {
    return view('formulario');
});

Route::post('/formulario', [FormularioController::class, 'submit']);

Route::get('/empleados', [EmpleadosController::class, 'index']);




