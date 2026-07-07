@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-10">

        <h1 class="text-4xl font-bold text-gray-800">
            Dashboard
        </h1>

        <p class="text-gray-500 mt-2">
            Sistema Integral de Gestión de Asistencia del Personal
        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-gray-500 uppercase text-sm">Empleados</h3>
            <p class="text-4xl font-bold mt-3">
                {{ $totalEmpleados }}
            </p>
        </div>

        <div class="bg-green-500 text-white rounded-xl shadow p-6">
            <h3 class="uppercase text-sm">Presentes Hoy</h3>
            <p class="text-4xl font-bold mt-3">
                {{ $presentesHoy }}
            </p>
        </div>

        <div class="bg-blue-500 text-white rounded-xl shadow p-6">
            <h3 class="uppercase text-sm">Salidas Registradas</h3>
            <p class="text-4xl font-bold mt-3">
                {{ $salidasHoy }}
            </p>
        </div>

        <div class="bg-yellow-400 rounded-xl shadow p-6">
            <h3 class="uppercase text-sm">Sin Salida</h3>
            <p class="text-4xl font-bold mt-3">
                {{ $sinSalida }}
            </p>
        </div>

    </div>

    <div class="bg-white rounded-xl shadow mt-10">

        <div class="border-b px-6 py-4">

            <h2 class="text-xl font-bold">
                Últimas Marcaciones
            </h2>

        </div>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="text-left p-4">Empleado</th>

                    <th class="text-left p-4">Fecha</th>

                    <th class="text-left p-4">Entrada</th>

                    <th class="text-left p-4">Salida</th>

                </tr>

            </thead>

            <tbody>

                @foreach($ultimasMarcaciones as $registro)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">
                        {{ $registro->empleado->nombre }}
                        {{ $registro->empleado->apellido }}
                    </td>

                    <td class="p-4">
                        {{ $registro->fecha }}
                    </td>

                    <td class="p-4 text-green-600 font-semibold">
                        {{ $registro->hora_entrada }}
                    </td>

                    <td class="p-4 text-red-600 font-semibold">
                        {{ $registro->hora_salida ?? '-' }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection