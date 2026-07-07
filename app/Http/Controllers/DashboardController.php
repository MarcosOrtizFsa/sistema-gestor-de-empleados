<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Asistencia;

class DashboardController extends Controller
{
    public function index()
    {
        $fechaHoy = date('Y-m-d');

        $totalEmpleados = Empleados::count();

        $presentesHoy = Asistencia::where('fecha', $fechaHoy)
            ->whereNotNull('hora_entrada')
            ->count();

        $sinSalida = Asistencia::where('fecha', $fechaHoy)
            ->whereNotNull('hora_entrada')
            ->whereNull('hora_salida')
            ->count();

        $salidasHoy = Asistencia::where('fecha', $fechaHoy)
            ->whereNotNull('hora_salida')
            ->count();

        $ultimasMarcaciones = Asistencia::with('empleado')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalEmpleados',
            'presentesHoy',
            'sinSalida',
            'salidasHoy',
            'ultimasMarcaciones'
        ));
    }
}