<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class FormularioController extends Controller
{
    public function submit(Request $request)
    {
        //dd($request->all());
        // Process the form submission
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $email = $request->input('email');
        $dni = $request->input('dni');
        $celular = $request->input('celular');
        $domicilio = $request->input('domicilio');

        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'domicilio' => 'nullable|string|max:255',
            'dni' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:50',
        ]);


        Empleados::create([
            'nombre'    => $nombre,
            'apellido'  => $apellido,
            'correo'    => $email,
            'domicilio' => $request->domicilio,
            'dni'       => $dni,
            'celular'   => $celular,
        ]);

        // Here you would typically save the data to a database or perform other actions

        //return view('formulario', ['datos' => $response]);
        //return redirect('/empleados')->with('success', 'Empleado guardado correctamente.');
        return view('empleados.create')->with('success', 'Empleado guardado correctamente.');
    }


}
