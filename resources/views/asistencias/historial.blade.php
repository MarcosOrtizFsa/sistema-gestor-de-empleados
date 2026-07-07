@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        Historial de Asistencias
    </h1>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-4">Empleado</th>
                    <th class="text-left p-4">Fecha</th>
                    <th class="text-left p-4">Entrada</th>
                    <th class="text-left p-4">Salida</th>
                    <th class="text-left p-4">Estado</th>
                </tr>
            </thead>

            <tbody>
                @forelse($asistencias as $asistencia)
                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-4">
                            {{ $asistencia->empleado->nombre }}
                            {{ $asistencia->empleado->apellido }}
                        </td>

                        <td class="p-4">
                            {{ $asistencia->fecha }}
                        </td>

                        <td class="p-4 text-green-600 font-semibold">
                            {{ $asistencia->hora_entrada }}
                        </td>

                        <td class="p-4 text-red-600 font-semibold">
                            {{ $asistencia->hora_salida ?? '-' }}
                        </td>

                        <td class="p-4">
                            @if($asistencia->hora_salida)
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                                    Completo
                                </span>
                            @else
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">
                                    Sin salida
                                </span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">
                            No hay registros de asistencia.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

    <div class="mt-6">
        {{ $asistencias->links() }}
    </div>

</div>

@endsection