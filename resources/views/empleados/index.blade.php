@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-slate-800 to-slate-900 px-8 py-6 flex justify-between items-center">

            <div>
                <h1 class="text-3xl font-bold text-white">
                    Lista de Empleados
                </h1>

                <p class="text-slate-300 mt-1">
                    Empleados registrados en el sistema
                </p>
            </div>

            <a href="/formulario"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow transition">

                + Nuevo empleado

            </a>

        </div>

        <!-- Tabla -->

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">
                            Nombre
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">
                            Apellido
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">
                            Correo
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">
                            DNI
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">
                            Celular
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-bold uppercase text-gray-600">
                            Domicilio
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-bold uppercase text-gray-600">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">

                    @forelse ($empleados as $empleado)

                        <tr class="hover:bg-blue-50 transition">

                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $empleado->nombre }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $empleado->apellido }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $empleado->correo }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $empleado->dni }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $empleado->celular }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $empleado->domicilio }}
                            </td>

                            <td class="px-6 py-4 text-center">

                                <div class="flex justify-center gap-2">

                                    <button
                                        class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-2 rounded-lg transition">

                                        Editar

                                    </button>

                                    <button
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg transition">

                                        Eliminar

                                    </button>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-10 text-gray-500">

                                No existen empleados registrados.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- Pie -->

        <div class="bg-gray-50 px-8 py-4 border-t">

            <p class="text-sm text-gray-500">

                Total de empleados:
                <strong>{{ count($empleados) }}</strong>

            </p>

        </div>

    </div>

</div>

@endsection