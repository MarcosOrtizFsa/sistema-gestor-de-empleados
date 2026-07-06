@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-slate-800 to-slate-900 px-8 py-6 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-white">
                    Historial de Asistencias
                </h1>
                <p class="text-slate-300 mt-1">
                    Registro de entradas y salidas del personal
                </p>
            </div>

            <a href="{{ route('asistencia.index') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow transition">
                Marcar asistencia
            </a>
        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">Empleado</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">DNI</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">Fecha</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">Entrada</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">Salida</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">Estado</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">

                    @forelse($asistencias as $asistencia)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $asistencia->empleado->nombre }} {{ $asistencia->empleado->apellido }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $asistencia->empleado->dni }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $asistencia->fecha }}
                            </td>

                            <td class="px-6 py-4 text-green-700 font-semibold">
                                {{ $asistencia->hora_entrada ?? 'Sin entrada' }}
                            </td>

                            <td class="px-6 py-4 text-red-700 font-semibold">
                                {{ $asistencia->hora_salida ?? 'Sin salida' }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                                    {{ $asistencia->estado }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-10 text-gray-500">
                                No hay asistencias registradas.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="px-8 py-4 bg-gray-50 border-t">
            {{ $asistencias->links() }}
        </div>

    </div>

</div>

@endsection