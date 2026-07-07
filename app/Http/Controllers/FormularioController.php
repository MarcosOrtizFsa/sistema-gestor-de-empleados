<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class FormularioController extends Controller
{
    public function index()
    {
        return view('empleados.create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'domicilio' => 'nullable|string|max:255',
            'dni' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:50',
        ]);

        Empleados::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->email,
            'domicilio' => $request->domicilio,
            'dni' => $request->dni,
            'celular' => $request->celular,
        ]);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado guardado correctamente.');
    }
}

