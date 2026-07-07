@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Encabezado institucional --}}
    <div class="bg-white rounded-2xl shadow p-6 mb-8 border border-gray-100">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <p class="text-sm uppercase tracking-wide text-blue-600 font-semibold">
                    Poder Legislativo de la Provincia de Formosa
                </p>

                <h1 class="text-4xl font-bold text-gray-800 mt-1">
                    SIPLF
                </h1>

                <p class="text-gray-500 mt-1">
                    Sistema Integral del Personal de la Legislatura de Formosa
                </p>
            </div>

            <div class="text-left md:text-right">
                <p class="text-sm text-gray-500">
                    Panel administrativo
                </p>

                <p class="text-xl font-semibold text-gray-800">
                    {{ now()->format('d/m/Y') }}
                </p>
            </div>

        </div>

    </div>

    {{-- Acciones rápidas --}}
    <div class="flex flex-col md:flex-row gap-3 mb-8">

        <a href="{{ route('asistencias.index') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow transition">
            Marcar Asistencia
        </a>

        <a href="{{ route('asistencias.historial') }}"
           class="bg-gray-800 hover:bg-gray-900 text-white px-5 py-3 rounded-xl shadow transition">
            Ver Historial
        </a>

        <a href="{{ route('personal.index') }}"
           class="bg-white hover:bg-gray-50 text-gray-800 px-5 py-3 rounded-xl shadow border transition">
            Lista de Empleados
        </a>

    </div>

    {{-- Tarjetas --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-slate-700">
            <p class="text-gray-500 uppercase text-sm font-semibold">
                Empleados
            </p>

            <p class="text-4xl font-bold mt-3 text-gray-800">
                {{ $totalEmpleados }}
            </p>

            <p class="text-sm text-gray-400 mt-2">
                Total registrados
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-green-500">
            <p class="text-gray-500 uppercase text-sm font-semibold">
                Presentes Hoy
            </p>

            <p class="text-4xl font-bold mt-3 text-green-600">
                {{ $presentesHoy }}
            </p>

            <p class="text-sm text-gray-400 mt-2">
                Personal con entrada registrada
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-blue-500">
            <p class="text-gray-500 uppercase text-sm font-semibold">
                Salidas Registradas
            </p>

            <p class="text-4xl font-bold mt-3 text-blue-600">
                {{ $salidasHoy }}
            </p>

            <p class="text-sm text-gray-400 mt-2">
                Jornadas completadas
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-yellow-400">
            <p class="text-gray-500 uppercase text-sm font-semibold">
                Sin Salida
            </p>

            <p class="text-4xl font-bold mt-3 text-yellow-600">
                {{ $sinSalida }}
            </p>

            <p class="text-sm text-gray-400 mt-2">
                Pendientes de registrar salida
            </p>
        </div>

    </div>

    {{-- Últimas marcaciones --}}
<div class="bg-white rounded-2xl shadow mt-10 overflow-hidden border border-gray-100">

    <div class="border-b px-6 py-4 flex items-center justify-between">

        <div>
            <h2 class="text-xl font-bold text-gray-800">
                Últimas Marcaciones
            </h2>

            <p class="text-sm text-gray-500">
                Registros recientes del personal legislativo
            </p>
        </div>

        <a href="{{ route('asistencias.historial') }}"
           class="text-sm text-blue-600 hover:underline">
            Ver todo
        </a>

    </div>

        {{-- Vista escritorio --}}
        <div class="hidden md:block overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left p-4 text-sm uppercase text-gray-600">Empleado</th>
                        <th class="text-left p-4 text-sm uppercase text-gray-600">Fecha</th>
                        <th class="text-left p-4 text-sm uppercase text-gray-600">Entrada</th>
                        <th class="text-left p-4 text-sm uppercase text-gray-600">Salida</th>
                        <th class="text-left p-4 text-sm uppercase text-gray-600">Estado</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($ultimasMarcaciones as $registro)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="p-4 font-medium text-gray-800">
                                {{ $registro->empleado->nombre }}
                                {{ $registro->empleado->apellido }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $registro->fecha }}
                            </td>

                            <td class="p-4 text-green-600 font-semibold">
                                {{ $registro->hora_entrada }}
                            </td>

                            <td class="p-4 text-red-600 font-semibold">
                                {{ $registro->hora_salida ?? '-' }}
                            </td>

                            <td class="p-4">
                                @if($registro->hora_salida)
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                        Completo
                                    </span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                                        Sin salida
                                    </span>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                No hay marcaciones registradas.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Vista celular --}}
        <div class="md:hidden p-4 space-y-4">

            @forelse($ultimasMarcaciones as $registro)

                <div class="border rounded-xl p-4 bg-gray-50">

                    <div class="flex items-start justify-between gap-3">

                        <div>
                            <p class="font-bold text-gray-800">
                                {{ $registro->empleado->nombre }}
                                {{ $registro->empleado->apellido }}
                            </p>

                            <p class="text-sm text-gray-500 mt-1">
                                Fecha: {{ $registro->fecha }}
                            </p>
                        </div>

                        <div>
                            @if($registro->hora_salida)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Completo
                                </span>
                            @else
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Sin salida
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-4">

                        <div class="bg-white rounded-lg p-3 border">
                            <p class="text-xs uppercase text-gray-400">
                                Entrada
                            </p>

                            <p class="text-green-600 font-bold mt-1">
                                {{ $registro->hora_entrada }}
                            </p>
                        </div>

                        <div class="bg-white rounded-lg p-3 border">
                            <p class="text-xs uppercase text-gray-400">
                                Salida
                            </p>

                            <p class="text-red-600 font-bold mt-1">
                                {{ $registro->hora_salida ?? '-' }}
                            </p>
                        </div>

                    </div>

                </div>

            @empty

                <div class="p-6 text-center text-gray-500">
                    No hay marcaciones registradas.
                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection