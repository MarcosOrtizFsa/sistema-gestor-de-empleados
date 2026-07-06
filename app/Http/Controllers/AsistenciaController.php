<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Asistencia;

class AsistenciaController extends Controller
{
    public function index()
    {
        return view('asistencias.marcar');
    }

    public function marcar(Request $request)
    {
        $request->validate([
            'dni' => 'required'
        ]);

        $empleado = Empleados::where('dni', $request->dni)->first();

        if (!$empleado) {
            return redirect()->route('asistencia.index')
                ->with('error', 'No se encontró un empleado con ese DNI.');
        }

        $fechaHoy = date('Y-m-d');
        $horaActual = date('H:i:s');

        $asistencia = Asistencia::where('empleado_id', $empleado->id)
            ->where('fecha', $fechaHoy)
            ->first();

        if (!$asistencia) {
            Asistencia::create([
                'empleado_id' => $empleado->id,
                'fecha' => $fechaHoy,
                'hora_entrada' => $horaActual,
                'estado' => 'Presente',
            ]);

            return redirect()->route('asistencia.index')
                ->with('success', 'Entrada registrada correctamente para ' . $empleado->nombre . ' ' . $empleado->apellido);
        }

        if ($asistencia->hora_salida == null) {
            $asistencia->update([
                'hora_salida' => $horaActual,
            ]);

            return redirect()->route('asistencia.index')
                ->with('success', 'Salida registrada correctamente para ' . $empleado->nombre . ' ' . $empleado->apellido);
        }

        return redirect()->route('asistencia.index')
            ->with('error', 'Este empleado ya registró entrada y salida hoy.');
    }

    public function historial()
    {
        $asistencias = Asistencia::with('empleado')
            ->latest()
            ->paginate(10);

        return view('asistencias.marcar', compact('asistencias'));
    }
}